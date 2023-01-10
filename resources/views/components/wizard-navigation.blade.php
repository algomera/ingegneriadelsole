@props(['steps'])
<nav class="flex" aria-label="Progress">
	<ol role="list" class="w-full flex items-center justify-around space-y-0 sm:flex-col sm:space-y-6 sm:items-start">
		@foreach($steps as $step)
			<li>
				<!-- Upcoming Step -->
				<div @if ($step->isPrevious())
					     wire:click="{{ $step->show() }}"
				     @endif class="group">
					<div class="flex items-start">
						@if($step->isPrevious())
							<span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center">
								<svg class="h-full w-full text-indigo-600 group-hover:text-indigo-800"
								     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
								     fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd"
									      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
									      clip-rule="evenodd"/>
								</svg>
							</span>
						@endif
						@if($step->isNext())
							<div class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center"
							     aria-hidden="true">
								<div class="h-2 w-2 rounded-full bg-gray-300 {{ $step->isPrevious() ? 'group-hover:bg-gray-400' : '' }}"></div>
							</div>
						@endif
						@if($step->isCurrent())
							<span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center"
							      aria-hidden="true">
								<span class="absolute h-4 w-4 rounded-full bg-indigo-200"></span>
								<span class="relative block h-2 w-2 rounded-full bg-indigo-600"></span>
							</span>
						@endif
						<p class="hidden sm:block ml-3 text-sm {{ $step->isCurrent() ? 'font-semibold text-indigo-500' : 'text-gray-500' }} {{ $step->isPrevious() ? 'group-hover:text-gray-900 cursor-pointer' : '' }}">{{ $step->label }}</p>
					</div>
				</div>
			</li>
		@endforeach
	</ol>
</nav>