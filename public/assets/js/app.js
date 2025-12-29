/* ---------------- LOADER ---------------- */
function showLoader() {
  document.getElementById("loadingOverlay")?.classList.remove("hidden");
  document.getElementById("compareBtn").disabled = true;
  document.getElementById("compareBtn").classList.add("opacity-60");
}

function hideLoader() {
  document.getElementById("loadingOverlay")?.classList.add("hidden");
  document.getElementById("compareBtn").disabled = false;
  document.getElementById("compareBtn").classList.remove("opacity-60");
}
/* ---------------------------------------- */

let mode = "earth";
let missionsLoaded = false;

/* ---------------- MISSIONS ---------------- */
async function loadMissions() {
  const select = document.getElementById("missionSelect");
  if (!select || missionsLoaded) return;

  select.innerHTML = `<option>Loading missions...</option>`;

  try {
    const res = await fetch("../api/spacex-missions.php");
    const missions = await res.json();

    select.innerHTML = `<option value="">Select a mission</option>`;

    missions.forEach(m => {
      const opt = document.createElement("option");
      opt.value = JSON.stringify(m);
      opt.textContent = `${m.name} (${m.orbit})`;
      select.appendChild(opt);
    });

    missionsLoaded = true;
  } catch (e) {
    select.innerHTML = `<option>Error loading missions</option>`;
  }
}
/* ----------------------------------------- */

/* MODE BUTTONS */
document.getElementById("earthTab").onclick = () => {
  mode = "earth";
  toggleTabs();
};

document.getElementById("spaceTab").onclick = () => {
  mode = "space";
  toggleTabs();
};

document.getElementById("missionTab").onclick = () => {
  mode = "mission";
  toggleTabs();
  loadMissions();
};

/* TOGGLE UI */
function toggleTabs() {
  document.getElementById("earthTab").className =
    mode === "earth"
      ? "px-4 py-2 rounded bg-indigo-600 text-white"
      : "px-4 py-2 rounded bg-slate-800 hover:bg-slate-700";

  document.getElementById("spaceTab").className =
    mode === "space"
      ? "px-4 py-2 rounded bg-indigo-600 text-white"
      : "px-4 py-2 rounded bg-slate-800 hover:bg-slate-700";

  document.getElementById("missionTab").className =
    mode === "mission"
      ? "px-4 py-2 rounded bg-indigo-600 text-white"
      : "px-4 py-2 rounded bg-slate-800 hover:bg-slate-700";

  document.getElementById("missionBox")?.classList.toggle(
    "hidden",
    mode !== "mission"
  );
}

/* ---------------- COMPARE ---------------- */
document.getElementById("compareBtn").onclick = async () => {
  showLoader();

  try {
    let distanceKm = 0;

    /* -------- MISSION MODE -------- */
    if (mode === "mission") {
      const selected = document.getElementById("missionSelect")?.value;

      if (!selected) {
        alert("Please select a mission");
        return;
      }

      const mission = JSON.parse(selected);
      distanceKm = mission.distance_km;

      document.getElementById("distanceText").innerHTML = `
        <strong>${mission.name}</strong><br>
        Orbit: ${mission.orbit}<br>
        Approx distance: ${distanceKm} km
      `;

      document.getElementById("resultBox").classList.remove("hidden");

      const timeRes = await fetch(
        `../api/travel-time.php?distance_km=${distanceKm}`
      );
      const times = await timeRes.json();

      renderTimes(times);
      return;
    }

    /* -------- EARTH & SPACE -------- */
    const from = document.getElementById("fromInput").value.trim();
    const to   = document.getElementById("toInput").value.trim();

    if (!from || !to) {
      alert("Please enter both locations");
      return;
    }

    if (mode === "space") {
      const res = await fetch(
        `../api/space-distance.php?from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}`
      );
      const data = await res.json();
      if (data.error) throw new Error(data.error);

      distanceKm = data.distance_km;

      document.getElementById("distanceText").innerHTML = `
        <strong>${distanceKm.toLocaleString()} km</strong><br>
        ${data.distance_au} AU<br>
        ${data.light_years} light-years
      `;
    }

    if (mode === "earth") {
      const res = await fetch(
        `../api/earth-distance.php?from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}`
      );
      const data = await res.json();
      if (data.error) throw new Error(data.error);

      distanceKm = data.distance_km;

      document.getElementById("distanceText").innerHTML = `
        <strong>${distanceKm.toLocaleString()} km</strong><br>
        ${data.distance_miles} miles
      `;
    }

    document.getElementById("resultBox").classList.remove("hidden");

    const timeRes = await fetch(
      `../api/travel-time.php?distance_km=${distanceKm}`
    );
    const times = await timeRes.json();

    renderTimes(times);

  } catch (err) {
    console.error(err);
    alert("Something went wrong. Please try again.");
  } finally {
    hideLoader();
  }
};

/* -------- TIME RENDER -------- */
function renderTimes(times) {
  let html = "";
  for (const v in times) {
    html += `
      <div class="flex justify-between">
        <span>${times[v].label}</span>
        <span>
          ${
            times[v].hours < 48
              ? times[v].hours + " hours"
              : times[v].days < 365
                ? times[v].days + " days"
                : times[v].years + " years"
          }
        </span>
      </div>
    `;
  }
  document.getElementById("timeList").innerHTML = html;
}
