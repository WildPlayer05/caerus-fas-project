<style>
	.animated {
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}

	.animated.faster {
		-webkit-animation-duration: 500ms;
		animation-duration: 500ms;
	}

	.fadeIn {
		-webkit-animation-name: fadeIn;
		animation-name: fadeIn;
	}

	.fadeOut {
		-webkit-animation-name: fadeOut;
		animation-name: fadeOut;
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	@keyframes fadeOut {
		from {
			opacity: 1;
		}

		to {
			opacity: 0;
		}
	}
</style>

<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex grid justify-end items-center sm:items-start animated fadeIn faster bg-black/[0.7] sm:bg-transparent"
	style="">
	<div
		class="border drop-shadow-xl modal-container bg-white w-full sm:w-auto sm:min-w-80 mx-4 sm:mr-2 sm:mt-[58px] rounded shadow-sm z-50 overflow-y-auto">
		<div class="modal-content py-4 text-left px-4">
			<!--Title-->
			<div class="flex justify-between items-center pb-3">
				@auth
				<p class="text-2xl font-bold">{{ Auth::user()->ragSoc}}</p>
				@endauth

				@guest
				<p class="text-2xl font-bold">Hello!</p>
				@endguest
				<div class="modal-close cursor-pointer z-50">
					<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
						viewBox="0 0 18 18">
						<path
							d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
						</path>
					</svg>
				</div>
			</div>
			<div class="w-full sm:flex grid sm:justify-center pt-2">

				@auth
				<button 
				@if (Auth::guard('supplier')->check())
					onclick="location.href='{{route('supplier.profile')}}'"
				@else
					onclick="location.href='{{route('profile.index')}}'"
				@endif
				type="button"
					class="rounded bg-blue-900 text-white text-xs font-semibold uppercase px-4 py-3 sm:mr-5 mb-3 sm:mb-auto">Manage
					your account</button>
				<button onclick="location.href='{{route('logout')}}'" type="button"
					class="rounded bg-blue-900 text-white text-xs font-semibold uppercase px-4 py-3 sm:mr-5">Logout</button>
				@endauth

				@guest
				<button onclick="location.href='{{route('user.dashboard')}}'" type="button"
					class="sm:min-w-28 rounded bg-blue-900 text-white text-xs font-semibold uppercase px-4 py-3 sm:mr-5 mb-3 sm:mb-auto">Log
					In</button>
				<button onclick="location.href='{{route('signup')}}'" type="button"
					class="sm:min-w-28 rounded bg-blue-900 text-white text-xs font-semibold uppercase px-4 py-3 sm:mr-5">Sign
					Up</button>
				@endguest

			</div>
		</div>
	</div>
</div>

<script>
	const modal = document.querySelector('.main-modal');
	const closeButton = document.querySelectorAll('.modal-close');

	const modalClose = () => {
		modal.classList.remove('fadeIn');
		modal.classList.add('fadeOut');
		setTimeout(() => {
			modal.style.display = 'none';
		}, 500);
	}

	const openModal = () => {
		modal.classList.remove('fadeOut');
		modal.classList.add('fadeIn');
		modal.style.display = 'flex';
	}

	for (let i = 0; i < closeButton.length; i++) {

		const elements = closeButton[i];

		elements.onclick = (e) => modalClose();

		modal.style.display = 'none';

		window.onclick = function (event) {
			if (event.target == modal) modalClose();
			@auth('web')
			if (event.target == chat) closeChat();
			@endauth
		};

		window.addEventListener("touchend", function (event) {
			if (event.target == modal) modalClose();
			@auth('web')
			if (event.target == chat) closeChat();
			@endauth
		});
	}
</script>