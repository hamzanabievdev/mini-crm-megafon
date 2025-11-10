@php
    $statusAppeal = match($appeal->status) {
        'Новая' => 'badge-primary',
        'В процессе' => 'badge-warning',
        'Решено' => 'badge-success',
        'Отклонено' => 'badge-danger',
        default => 'badge-secondary',
    };
@endphp
@extends('layouts.app')
@section('title', 'Список обращений/жалоб')
@section('menuName', 'Клиенты')
@section('content')
    <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Hero card-->
                <div class="card mb-12">
                    <!--begin::Hero body-->
                    <div class="card-body flex-column p-5">
                         <!--begin::Hero nav-->
                        <div class="card-rounded bg-light d-flex flex-stack flex-wrap p-5">
                            <h1 class="fs-4 fs-lg-2 text-gray-600">Информация:</h1>
                            <!--begin::Nav-->
                            <ul class="nav flex-wrap border-transparent fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item my-1">
                                    <span class="text-gray-600 mt-1 fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1">{{ $appeal->full_name }}</span>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item my-1">
                                    <span class="text-gray-600 mt-1 fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase">{{ $appeal->personal_account }}</span>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item my-1">
                                    <span class="text-gray-600 mt-1 fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase">+992 {{ $appeal->phone }}</span>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item my-1">
                                    <span id="status_appeal" class="text-white badge {{ $statusAppeal }} mt-3 fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase">{{ $appeal->status }}</span>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                            <!--end::Nav-->
                        </div>
                        <!--end::Hero nav-->
                        <!--begin::Hero content-->
                        <div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                                <!--begin::Title-->
                                <h1 class="fw-bold fs-4 fs-lg-1 text-gray-800 mb-5 mb-lg-10">{{$appeal->subject}}</h1>
                                <!--end::Title-->
                                <!--begin::Input group-->
                                <div class="position-relative w-100">
                                    <!--begin::Action-->
                                    @if($appeal->status === 'В процессе')
                                        @php
                                            $operatorName = $appeal->operator ? $appeal->operator->full_name : '';
                                        @endphp
                                        <select class="form-select w-50" data-control="select2" data-placeholder="{{ $operatorName }}" disabled>
                                            <option></option>
                                            @if($operatorName)
                                                <option value="{{ $operatorName }}" selected>{{ $operatorName }}</option>
                                            @endif
                                        </select>
                                    @else
                                        <a href="#" id="accept_appeal" class="btn btn-success fw-bold fs-8 fs-lg-base">Принять жалобу</a>
                                    @endif
                                    <!--end::Action-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div class="flex-equal d-flex justify-content-center align-items-end ms-5">
                                <!--begin::Illustration-->
                                <img src="{{ asset('assets/media/illustrations/sketchy-1/20.png') }}" alt="" class="mw-100 mh-125px mh-lg-275px mb-lg-n12" />
                                <!--end::Illustration-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Hero content-->
                       
                    </div>
                    <!--end::Hero body-->
                </div>
                <!--end::Hero card-->
                <!--begin::About card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-10 p-lg-15">
                        <!--begin::Content main-->
                        <div class="mb-14">
                            <!--begin::Heading-->
                            <div class="mb-15">
                                <!--begin::Title-->
                                <h1 class="fs-2x text-dark mb-6">{{ $appeal->subject }}</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-gray-600 fw-semibold">{{ $appeal->message }}</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Heading-->
                        </div>
                        <!--end::Content main-->
                       
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::About card-->
               <!-- begin: Comments block -->
                <div class="card mt-8">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title fw-bold fs-6 m-0">Комментарии</h3>
                        <div class="text-muted fs-7">{{ $appeal->comments->count() }} комментариев</div>
                    </div>

                    <div class="card-body p-6">
                        <!-- Comments list -->
                        <div id="commentsList" class="timeline">
                            @forelse($appeal->comments as $comment)
                                <div class="d-flex mb-5">
                                    <div class="symbol symbol-40px me-4">
                                        <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="avatar" class="rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <div>
                                                <div class="fw-bold text-gray-800">{{ $comment->user->full_name }}</div>
                                            </div>
                                            <div class="text-muted fs-8">{{ $comment->created_at ? $comment->created_at->format('d.m.Y H:i') : '' }}</div>
                                        </div>
                                        <div class="text-gray-700 fs-7">{{ $comment->message }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted py-6">Комментариев пока нет.</div>
                            @endforelse
                        </div>

                        <!-- Divider -->
                        <div class="separator my-6"></div>
                    </div>
                </div>
                <!-- end: Comments block -->

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
    <script src="{{ asset('assets/js/custom/apps/support-center/tickets/create.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/js/appeals/accept.js') }}"></script>
<!--end::Javascript-->
@endsection