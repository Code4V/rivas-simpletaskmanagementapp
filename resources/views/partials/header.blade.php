<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Simple Task Management</title>
  <link rel="shortcut icon" href="{{ URL::to('/')}}/images/wave.png" type="image/x-icon">
</head>
<body class="bg-white">

<header class="w-full border-b border-slate-400/70 ps-8 py-4 flex items-center gap-4">
<div class="w-16 h-16 bg-red-600 overflow-hidden">
    <img src="{{URL::to('/')}}/images/wave.png" alt="" class="scale-150 object-top" srcset="">
  </div>
  <div>
    <a href="/">
      <h1 class="font-bold text-2xl"><span class="text-sky-900">Task Me</span> Anything!</h1>
    </a>
    <span class="text-gray-600">A simple task management app</span>
  </div>
</header>

