@props(['steps'])
<nav class="flex" aria-label="Progress">
	<ol role="list" class="w-full flex items-center justify-around space-y-0 sm:flex-col sm:space-y-6 sm:items-start">
		@foreach($steps as $step)
			<li>
				<!-- Upcoming Step -->
				<div @if ($step->isPrevious() || !auth()->user()->can('customer_update'))
					     wire:click="{{ $step->show() }}"
				     @endif class="group @if(!auth()->user()->can('customer_update')) cursor-pointer @endif">
					<div class="flex items-start">
						@if($step->isPrevious() || $step->isNext())
							<div class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center"
							     aria-hidden="true">
								<div class="h-2 w-2 rounded-full bg-gray-300 {{ $step->isPrevious() || !auth()->user()->can('customer_update') ? 'group-hover:bg-gray-400' : '' }}"></div>
							</div>
						@endif
						@if($step->isCurrent())
							@if($errors->any())
								<span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center">
									<x-heroicon-o-x-circle
											class="h-full w-full text-red-600 group-hover:text-red-800"></x-heroicon-o-x-circle>
								</span>
							@else
								<span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center"
								      aria-hidden="true">
									<span class="absolute h-4 w-4 rounded-full bg-indigo-200"></span>
									<span class="relative block h-2 w-2 rounded-full bg-indigo-600"></span>
								</span>
							@endif
						@endif
						<p class="hidden sm:block ml-3 text-sm {{ $step->isCurrent() ? $errors->any() ? 'font-semibold text-red-500' : 'font-semibold text-indigo-500' : 'text-gray-500' }} {{ $step->isPrevious() || (!auth()->user()->can('customer_update') && !$step->isCurrent()) ? 'group-hover:text-gray-900 cursor-pointer' : '' }}">{{ $step->label }}</p>
					</div>
				</div>
			</li>
		@endforeach
	</ol>
</nav>