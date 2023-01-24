<div class="border-t border-gray-200 bg-white px-4 py-5 rounded-b-xl">
	<div class="mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
		<div>
			@isset($left_actions)
				<div class="flex-shrink-0">
					{{ $left_actions }}
				</div>
			@endisset
		</div>
		@isset($right_actions)
			<div class="flex-shrink-0">
				{{ $right_actions }}
			</div>
		@endisset
	</div>
</div>