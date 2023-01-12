<div class="border-b border-gray-200 bg-white px-4 py-5">
	<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
			<div class="ml-4 mt-2">
		@isset($title)
					<h3 class="text-lg font-semibold leading-6 text-gray-900">{{ $title }}</h3>
				@endisset
			</div>
		@isset($actions)
			<div class="flex space-x-3 ml-4 mt-2 flex-shrink-0">
				{{ $actions }}
			</div>
		@endisset
	</div>
</div>