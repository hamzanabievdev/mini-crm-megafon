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
                                <input type="text" id="search" class="form-control form-control-solid w-250px ps-12" placeholder="Поиск клиента" />
                            </div>
                        </div>
                        <a class="btn btn-sm btn-success align-self-center" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1">Создать новое</a>
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th></th>
                                    <th class="min-w-30px">ФИО</th>
                                    <th class="text-end min-w-100px">Лиц. счет</th>
                                    <th class="text-end min-w-100px">Номер телефона</th>
                                    <th></th>
                                    <th class="text-end min-w-100px">Статус</th>
                                    <th class="text-end min-w-100px">Дата</th>
                                    <th class="text-end min-w-70px">Время</th>
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
    <script src="{{ asset('assets/js/appeals/create.js') }}"></script>
    <script src="{{ asset('assets/js/appeals/list.js') }}"></script>
<!--end::Javascript-->
@endsection