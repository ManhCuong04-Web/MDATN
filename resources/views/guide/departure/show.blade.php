@extends('layouts.app')

@section('title', 'Chi tiết tour - Hướng dẫn viên')

@section('content')
<div class="container py-5">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fas fa-calendar-alt me-2"></i>Chi tiết tour
        </h2>
        <a href="{{ route('guide.dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    {{-- THÔNG TIN TOUR --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $departure->tour->title }}</h5>
        </div>

        <div class="card-body">
            <div class="row">

                {{-- Cột trái --}}
                <div class="col-md-6">
                    <p><strong>Ngày khởi hành:</strong> {{ $departure->departure_date->format('d/m/Y') }}</p>
                    <p><strong>Tổng ghế:</strong> {{ $departure->seats_total }}</p>
                    <p><strong>Ghế trống:</strong> {{ $departure->seats_available }}</p>
                </div>

                {{-- Cột phải --}}
                <div class="col-md-6">
                    <p><strong>Loại xe:</strong> {{ $departure->vehicle_type ?? 'Đang cập nhật' }}</p>

                    @if ($departure->vehicle_details)
                        <p><strong>Chi tiết xe:</strong> {{ $departure->vehicle_details }}</p>
                    @endif

                    @if ($departure->driver_contact)
                        <p><strong>Liên hệ tài xế:</strong> {{ $departure->driver_contact }}</p>
                    @endif

                    {{-- ⭐ TRẠNG THÁI TOUR (DÙNG tour_status) --}}
                    <p><strong>Trạng thái tour:</strong>
                        @if ($departure->tour_status === 'completed')
                            <span class="badge bg-success">Đã kết thúc</span>

                        @elseif ($departure->tour_status === 'running')
                            <span class="badge bg-warning text-dark">Đang diễn ra</span>

                        @elseif ($departure->tour_status === 'preparing')
                            <span class="badge bg-info">Chuẩn bị</span>

                        @elseif ($departure->tour_status === 'has_issue')
                            <span class="badge bg-danger">Có sự cố</span>

                        @else
                            <span class="badge bg-secondary">Chưa bắt đầu</span>
                        @endif
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- THAO TÁC NHANH --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3">
                        <i class="fas fa-bolt me-2"></i>Thao tác nhanh
                    </h5>

                    <div class="row">

                        {{-- Danh sách khách --}}
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('guide.departures.customers', $departure->id) }}"
                               class="btn btn-outline-info w-100">
                                <i class="fas fa-users me-2"></i>Danh sách khách
                            </a>
                        </div>

                        {{-- Nhật ký tour --}}
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('guide.tour-logs.index', $departure->id) }}"
                               class="btn btn-outline-success w-100">
                                <i class="fas fa-book me-2"></i>Nhật ký tour
                            </a>
                        </div>

                        {{-- Check-in --}}
                        <div class="col-md-3 mb-2">
                            @if ($departure->tour_status !== 'completed')
                                <a href="{{ route('guide.roll-calls.index', $departure->id) }}"
                                   class="btn btn-outline-warning w-100">
                                    <i class="fas fa-check-circle me-2"></i>Check-in
                                </a>
                            @else
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="fas fa-ban me-2"></i>Tour đã kết thúc
                                </button>
                            @endif
                        </div>

                        {{-- Yêu cầu đặc biệt --}}
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('guide.special-requests.index', $departure->id) }}"
                               class="btn btn-outline-primary w-100">
                                <i class="fas fa-clipboard-list me-2"></i>Yêu cầu đặc biệt
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- DANH SÁCH NGƯỜI LIÊN HỆ --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">
                <i class="fas fa-user me-2"></i>Người liên hệ trong đoàn
            </h5>
        </div>

        <div class="card-body">

            @if ($departure->bookings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Khách hàng</th>
                                <th>Số lượng hành khách</th>
                                <th>Trạng thái booking</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($departure->bookings as $booking)
                                <tr>
                                    <td>
                                        <strong>{{ $booking->user->name }}</strong><br>
                                        <small>{{ $booking->user->phone ?? 'N/A' }}</small><br>
                                        <small>{{ $booking->user->email ?? '' }}</small>
                                    </td>

                                    <td>
                                        {{ $booking->passengers->count() }} người
                                    </td>

                                    <td>
                                        @if ($departure->tour_status === 'completed')
                                            <span class="badge bg-success">Đã kết thúc</span>
                                        @elseif (in_array($booking->status, ['paid','completed']))
                                            <span class="badge bg-success">Đã xác nhận</span>
                                        @elseif ($booking->status === 'confirmed')
                                            <span class="badge bg-info">Đã xác nhận</span>
                                        @else
                                            <span class="badge bg-warning">Chờ xử lý</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @else
                <p class="text-muted text-center py-3">Chưa có booking nào</p>
            @endif

        </div>
    </div>



    {{-- DANH SÁCH ĐOÀN --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-users me-2"></i>Danh sách đoàn
            </h5>
            <small>Tổng số hành khách: {{ $passengers->count() }}</small>
        </div>

        <div class="card-body">

            @if ($passengers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">

                        <thead class="table-light">
                            <tr>
                                <th width="60">STT</th>
                                <th>Họ tên</th>
                                <th>Loại</th>
                                <th>Năm sinh</th>
                                <th>Thuộc booking</th>
                                <th>Liên hệ</th>
                                <th class="text-center">Check-in</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($passengers as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td class="fw-bold">{{ $p->full_name }}</td>

                                    <td>
                                        @if ($p->passenger_type === 'adult')
                                            <span class="badge bg-primary">Người lớn</span>
                                        @elseif($p->passenger_type === 'child')
                                            <span class="badge bg-success">Trẻ em</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Em bé</span>
                                        @endif
                                    </td>

                                    <td>{{ $p->birth_year ?? '-' }}</td>

                                    <td>{{ $p->booking->user->name }}</td>

                                    <td>
                                        <i class="fas fa-phone"></i> {{ $p->booking->user->phone ?? 'N/A' }}
                                    </td>

                                    <td class="text-center"> 
                                        <input type="checkbox" class="form-check-input" disabled>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @else
                <p class="text-muted text-center py-3">Chưa có hành khách nào</p>
            @endif

        </div>
    </div>

</div>
@endsection
