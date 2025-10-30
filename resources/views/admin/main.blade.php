@extends('layouts.main')
@section('content')
    <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" id="search" class="form-control form-control-solid w-250px ps-12" placeholder="Поиск сотрудника" />
                            </div>
                        </div>
                        <a class="btn btn-sm btn-success align-self-center" data-bs-toggle="modal" data-bs-target="#modal_add_user">Создать пользователя</a>
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2"></th>
                                    <th class="min-w-200px">Полное имя</th>
                                    <th class="text-end min-w-100px"></th>
                                    <th class="text-end min-w-70px">Логин</th>
                                    <th class="text-end min-w-100px"></th>
                                    <th class="text-end min-w-100px">Эл. почта</th>
                                    <th class="text-end min-w-100px"></th>
                                    <th class="text-end min-w-70px">Роль</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600" id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!--end::Content-->
    <div class="modal fade" tabindex="-1" id="modal_add_user">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Создать нового пользователя</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="ФИО" id="full_name" name="full_name" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="Логин" id="login" name="login" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="Электронная почта" id="email" name="email" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="fv-row mb-8">
                             <select id="role" class="form-select" data-control="select2" data-placeholder="Роль">
								<option></option>
								<option value="operator">Оператор</option>
								<option value="backoffice">Бэк-оффис</option>
							</select>
                        </div>
						<div class="fv-row mb-8">
                            <input type="password" placeholder="Новый пароль" id="password" name="password" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Отменить</button>
                        <button type="button" id="create_user" class="btn btn-success">Создать</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
<!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('assets/') }}";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/authentication/check.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/js/users/list.js') }}"></script>
    <script src="{{ asset('assets/js/users/create.js') }}"></script>
<!--end::Javascript-->
@endsection