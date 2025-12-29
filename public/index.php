<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Travel Distance & Time Comparison</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen">

<!-- HEADER -->
<header class="border-b border-slate-800">
  <div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold">
      🌍 Travel Distance & Time Comparison
    </h1>
    <p class="text-slate-400 mt-1">
      Compare cities, planets, rockets and spacecraft in human terms
    </p>
  </div>
</header>

<!-- MAIN -->
<main class="max-w-6xl mx-auto px-4 py-10">

  <!-- MODE TABS -->
  <div class="flex gap-3 mb-8">
    <button id="earthTab"
      class="px-4 py-2 rounded bg-indigo-600 text-white">
      🌆 Earth
    </button>

    <button id="spaceTab"
      class="px-4 py-2 rounded bg-slate-800 hover:bg-slate-700">
      🪐 Space
    </button>

    <button id="missionTab"
       class="px-4 py-2 rounded bg-slate-800 hover:bg-slate-700">
      🛰 Missions
    </button>
  </div>



  <!-- FORM CARD -->
  <div class="bg-slate-900 border border-slate-800 rounded-xl p-6">

    <!-- FROM / TO -->
     <!-- MISSION SELECTOR -->
    <div id="missionBox" class="hidden mt-6">
      <label class="block text-sm mb-2">Select Space Mission</label>
      <select
        id="missionSelect"
        class="w-full bg-slate-800 border border-slate-700 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <option value="">Loading missions...</option>
      </select>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
      <div>
        <label class="block text-sm mb-2">From</label>
        <input
          id="fromInput"
          type="text"
          placeholder="Earth: New York | Space: Earth"
          class="w-full bg-slate-800 border border-slate-700 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>

      <div>
        <label class="block text-sm mb-2">To</label>
        <input
          id="toInput"
          type="text"
          placeholder="Earth: Tokyo | Space: Mars"
          class="w-full bg-slate-800 border border-slate-700 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>
    </div>

    <!-- ACTION -->
    <div class="mt-6">
      <button
        id="compareBtn"
        class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 transition px-6 py-3 rounded font-semibold">
        🚀 Compare Distance
      </button>
    </div>
  </div>

  <!-- RESULT -->
  <div id="resultBox" class="hidden mt-10">

    <!-- DISTANCE -->
    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 mb-6">
      <h2 class="text-xl font-semibold mb-3">📏 Distance</h2>
      <p id="distanceText" class="text-slate-300"></p>
    </div>

    <!-- TIME COMPARISON -->
    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6">
      <h2 class="text-xl font-semibold mb-4">⏱ Travel Time Comparison</h2>

      <div id="timeList" class="space-y-4">
        <!-- JS injects rows -->
      </div>
    </div>

    <!-- SHARE -->
    <div class="mt-6 text-right">
      <button
        id="shareBtn"
        class="bg-slate-800 hover:bg-slate-700 px-4 py-2 rounded">
        🔗 Share Result
      </button>
    </div>

  </div>

  <!-- LOADING OVERLAY -->
<div id="loadingOverlay"
  class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50">

  <div class="bg-slate-900 border border-slate-700 rounded-xl px-6 py-5 flex items-center gap-4">
    <svg class="animate-spin h-6 w-6 text-indigo-500"
         xmlns="http://www.w3.org/2000/svg"
         fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10"
              stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
      </path>
    </svg>
    <span class="text-slate-200 text-sm">
      Calculating distance & time...
    </span>
  </div>

</div>

</main>

<!-- FOOTER -->
<footer class="border-t border-slate-800 mt-16">
  <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-slate-500 text-center">
    <p>
      Built using PHP, Tailwind, JavaScript, & Free APIs. <span style="color:red;">Happily Developed</span> by <a href="https://octteen.com/badhonacharia/">Badhon Acharia </a>(Web Developer | PHP | WordPress | Backend System)
    </p>
  </div>
</footer>

<!-- JS -->
<script src="assets/js/app.js"></script>

</body>
</html>
