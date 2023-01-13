<div class="border-t border-gray-200 bg-white px-4 py-5 rounded-b-xl">
	<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
		<div class="mt-2">
			@isset($left_actions)
				<div class="ml-4 mt-2 flex-shrink-0">
					{{ $left_actions }}
				</div>
			@endisset
		</div>
		@isset($right_actions)
			<div class="ml-4 mt-2 flex-shrink-0">
				{{ $right_actions }}
			</div>
		@endisset
	</div>
</div>