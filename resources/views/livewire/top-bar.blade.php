<div class="px-4 py-0 xl:py-2 bg-white">
	<div class="flex justify-end">
		<div class="hidden sm:flex sm:items-center sm:ml-6">
			<!-- Teams Dropdown -->
			@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
				<div class="ml-3 relative">
					<x-jet-dropdown align="right" width="60">
						<x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
						</x-slot>

						<x-slot name="content">
							<div class="w-60">
								<!-- Team Management -->
								<div class="block px-4 py-2 text-xs text-gray-400">
									{{ __('Manage Team') }}
								</div>

								<!-- Team Settings -->
								<x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
									{{ __('Team Settings') }}
								</x-jet-dropdown-link>

								@can('create', Laravel\Jetstream\Jetstream::newTeamModel())
									<x-jet-dropdown-link href="{{ route('teams.create') }}">
										{{ __('Create New Team') }}
									</x-jet-dropdown-link>
								@endcan

								<div class="border-t border-gray-100"></div>

								<!-- Team Switcher -->
								<div class="block px-4 py-2 text-xs text-gray-400">
									{{ __('Switch Teams') }}
								</div>

								@foreach (Auth::user()->allTeams() as $team)
									<x-jet-switchable-team :team="$team" />
								@endforeach
							</div>
						</x-slot>
					</x-jet-dropdown>
				</div>
			@endif

			<!-- Settings Dropdown -->
			<div class="ml-3 relative">
				<x-jet-dropdown align="right" width="48">
					<x-slot name="trigger">
						@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
							<button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
								<img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
							</button>
						@else
							<span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
						@endif
					</x-slot>

					<x-slot name="content">
						<!-- Account Management -->
						<div class="block px-4 py-2 text-xs text-gray-400">
							{{ __('Manage Account') }}
						</div>

						<x-jet-dropdown-link href="{{ route('profile.show') }}">
							{{ __('Profile') }}
						</x-jet-dropdown-link>

						@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
							<x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
								{{ __('API Tokens') }}
							</x-jet-dropdown-link>
						@endif

						<div class="border-t border-gray-100"></div>

						<!-- Authentication -->
						<form method="POST" action="{{ route('logout') }}" x-data>
							@csrf

							<x-jet-dropdown-link href="{{ route('logout') }}"
							                     @click.prevent="$root.submit();">
								{{ __('Log Out') }}
							</x-jet-dropdown-link>
						</form>
					</x-slot>
				</x-jet-dropdown>
			</div>
		</div>
	</div>
</div>