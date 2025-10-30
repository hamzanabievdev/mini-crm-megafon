<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../"/>
		<title>Mini CRM Megafon - Авторизация</title>
		<meta charset="utf-8" />
		<meta name="description" content="Mini CRM Megafon - Авторизация" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Mini CRM Megafon - Авторизация" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Mini CRM Megafon - Авторизация" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        <style>
            .text-danger {
                color: rgb(26, 151, 26) !important;
            }
            .btn-success {
				background-color: rgb(46, 172, 46) !important;
			}
			@media (max-width: 768px) {
				#aside_content {
					all: unset !important;
					display: block !important;
				}
			}

        </style>
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url("{{ asset('assets/media/auth/bg10.jpeg') }}"); } [data-bs-theme="dark"] body { background-image: url("{{ asset('assets/media/auth/bg10-dark.jpeg') }}"); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="aside_content" class="d-flex flex-lg-row-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<!--begin::Image-->
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/logos/horizontal-logo.png') }}" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/logos/horizontal-logo.png') }}" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<h1 class="fs-2qx fw-bold text-dark text-center mb-7">Вход в Mini CRM Megafon</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="text-gray-600 fs-base text-center fw-semibold">Добро пожаловать в
						<a href="#" class="opacity-75-hover text-danger me-1">Mini CRM Megafon</a>! Для доступа к системе
						<br />введите логин и пароль, предоставленные вашим администратором.
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<!--begin::Wrapper-->
					<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
						<!--begin::Content-->
						<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
							<!--begin::Wrapper-->
							<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
								<!--begin::Form-->
								<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
									<!--begin::Heading-->
									<div class="text-center mb-11">
										<!--begin::Title-->
										<h1 class="text-dark fw-bolder mb-3">Авторизация</h1>
										<!--end::Title-->
										<!--begin::Subtitle-->
										<div class="text-gray-500 fw-semibold fs-6">Введите данные для авторизации в <a href="#" class="opacity-75-hover text-danger me-1">Mini CRM Megafon</a></div>
										<!--end::Subtitle=-->
									</div>
									<!--begin::Heading-->
									<!--begin::Input group=-->
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" placeholder="Электронная почта или логин" id="login" name="login" autocomplete="off" class="form-control bg-transparent" />
										<!--end::Email-->
									</div>
									<!--end::Input group=-->
									<div class="fv-row mb-3">
										<!--begin::Password-->
										<input type="password" placeholder="Пароль" id="password" name="password" autocomplete="off" class="form-control bg-transparent" />
										<!--end::Password-->
									</div>
									<!--end::Input group=-->
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
										<div></div>
										<!--begin::Link-->
										<a href="../../demo1/dist/authentication/layouts/overlay/reset-password.html" class="link-success">Забыли пароль ?</a>
										<!--end::Link-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Submit button-->
									<div class="d-grid mb-10">
										<button type="button" id="entry_submit" class="btn btn-success text-white">
											<!--begin::Indicator label-->
											<span class="indicator-label">Войти</span>
											<!--end::Indicator label-->
											<!--begin::Indicator progress-->
											<span class="indicator-progress">Пожалуйста подождите...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											<!--end::Indicator progress-->
										</button>
									</div>
									<!--end::Submit button-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Footer-->
							<div class="d-flex flex-stack">
								<!--begin::Languages-->
								<div class="me-10">
									<!--begin::Toggle-->
									<button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-success rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
										<img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="{{ asset('assets/media/flags/russia.svg') }}" alt="" />
										<span data-kt-element="current-lang-name" class="me-1">Русский</span>
										<i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>
									</button>
									<!--end::Toggle-->
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-success fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
										<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5 active">
													<span class="symbol symbol-20px me-4">
														<img class="rounded-1" src="{{ asset('assets/media/flags/russia.svg') }}" alt="" />
													</span>Русский</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5 active">
													<span class="symbol symbol-20px me-4">
														<img class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
													</span>English</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5 active">
													<span class="symbol symbol-20px me-4">
														<img class="rounded-1" src="{{ asset('assets/media/flags/tajikistan.svg') }}" alt="" />
													</span>Точики</a>
												</div>
												<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Languages-->
								<!--begin::Links-->
								<div class="d-flex fw-semibold text-primary fs-base gap-5">
									<a href="https://megafon.tj/" class="link-success" target="_blank">О нас</a>
									<a href="https://megafon.tj/" class="link-success" target="_blank">Поддержка</a>
									<a href="https://megafon.tj/" class="link-success" target="_blank">Контакты</a>
								</div>
								<!--end::Links-->
							</div>
							<!--end::Footer-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('assets/') }}/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
        <script src="{{ asset('assets/js/authentication/entry.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
