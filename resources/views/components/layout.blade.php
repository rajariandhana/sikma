<html>
<head>
	@vite(['resources/css/app.css','resources/js/app.js'])
	@livewireStyles
</head>
<body class="bg-gray-100">
	@livewireScripts
	<x-navbar></x-navbar>
	<div class="flex flex-col w-full gap-y-4 px-12 my-8">
		{{$slot}}
	</div>
</body>
</html>
