<?php

// namespace App\Http\Controllers\Guide;

// use App\Http\Controllers\Controller;
// use App\Models\CheckIn;
// use App\Models\TourDeparture;
// use App\Models\Booking;
// use Illuminate\Http\Request;
// use Illuminate\View\View;

// class CheckInController extends Controller
// {
//     /**
//      * Danh sách check-in của một departure
//      */
//     public function index(Request $request, $departureId): View
//     {
//         $user = auth()->user();

//         $departure = TourDeparture::where('guide_id', $user->id)
//             ->with(['tour', 'bookings.user'])
//             ->findOrFail($departureId);

//         $bookings = $departure->bookings()
//             ->where('status', '!=', 'cancelled')
//             ->with(['user', 'checkIns' => function($query) use ($departureId) {
//                 $query->where('departure_id', $departureId)
//                     ->orderBy('check_in_time', 'desc');
//             }])
//             ->get();

//         return view('guide.check-ins.index', compact('departure', 'bookings'));
//     }

//     /**
//      * Check-in một booking
//      */
//     public function store(Request $request, $departureId)
//     {
//         $user = auth()->user();

//         $departure = TourDeparture::where('guide_id', $user->id)
//             ->findOrFail($departureId);

//         $validated = $request->validate([
//             'booking_id' => 'required|exists:bookings,id',
//             'check_in_time' => 'required|date',
//             'check_in_location' => 'nullable|string|max:255',
//             'status' => 'required|in:checked_in,checked_out,absent',
//             'notes' => 'nullable|string|max:1000',
//         ]);

//         // Kiểm tra booking thuộc departure này
//         $booking = Booking::where('id', $validated['booking_id'])
//             ->where('departure_id', $departureId)
//             ->firstOrFail();

//         CheckIn::create([
//             'departure_id' => $departureId,
//             'booking_id' => $validated['booking_id'],
//             'checked_by' => $user->id,
//             'check_in_time' => $validated['check_in_time'],
//             'check_in_location' => $validated['check_in_location'],
//             'status' => $validated['status'],
//             'notes' => $validated['notes'],
//         ]);

//         // if ($request->expectsJson()) {
//         //     return response()->json(['success' => true, 'message' => 'Đã ghi nhận check-in thành công.']);
//         // }

//         // return redirect()
//         //     ->route('guide.check-ins.index', $departureId)
//         //     ->with('success', 'Đã ghi nhận check-in thành công.');
//         if ($request->wantsJson() || $request->ajax()) {
//             return response()->json([
//                 'success' => true,
//                 'message' => 'Đã ghi nhận check-in thành công.'
//             ]);
//         }

//         return redirect()
//             ->route('guide.check-ins.index', $departureId)
//             ->with('success', 'Đã ghi nhận check-in thành công.');
//     }

//     /**
//      * Lấy thông tin check-in để edit (JSON)
//      */
//     public function show($departureId, $checkInId)
//     {
//         $user = auth()->user();

//         $checkIn = CheckIn::where('departure_id', $departureId)
//             ->where('checked_by', $user->id)
//             ->findOrFail($checkInId);

//         return response()->json([
//             'id' => $checkIn->id,
//             'check_in_time' => $checkIn->check_in_time->format('Y-m-d\TH:i'),
//             'check_in_location' => $checkIn->check_in_location,
//             'status' => $checkIn->status,
//             'notes' => $checkIn->notes,
//         ]);
//     }

//     /**
//      * Cập nhật check-in
//      */
//     public function update(Request $request, $departureId, $checkInId)
//     {
//         $user = auth()->user();

//         $checkIn = CheckIn::where('departure_id', $departureId)
//             ->where('checked_by', $user->id)
//             ->findOrFail($checkInId);

//         $validated = $request->validate([
//             'check_in_time' => 'required|date',
//             'check_in_location' => 'nullable|string|max:255',
//             'status' => 'required|in:checked_in,checked_out,absent',
//             'notes' => 'nullable|string|max:1000',
//         ]);

//         $checkIn->update($validated);

//         if ($request->expectsJson()) {
//             return response()->json(['success' => true, 'message' => 'Đã cập nhật check-in thành công.']);
//         }

//         return redirect()
//             ->route('guide.check-ins.index', $departureId)
//             ->with('success', 'Đã cập nhật check-in thành công.');
//     }

//     /**
//      * Xóa check-in
//      */
//     public function destroy($departureId, $checkInId)
//     {
//         $user = auth()->user();

//         $checkIn = CheckIn::where('departure_id', $departureId)
//             ->where('checked_by', $user->id)
//             ->findOrFail($checkInId);

//         $checkIn->delete();

//         return redirect()
//             ->route('guide.check-ins.index', $departureId)
//             ->with('success', 'Đã xóa check-in thành công.');
//     }
// }


// namespace App\Http\Controllers\Guide;

// use App\Http\Controllers\Controller;
// use App\Models\CheckIn;
// use App\Models\TourDeparture;
// use App\Models\Booking;
// use Illuminate\Http\Request;
// use Illuminate\View\View;

// class CheckInController extends Controller
// {
//     /**
//      * Danh sách check-in của một departure
//      */
//     public function index(Request $request, $departureId): View
//     {
//         $user = auth()->user();

//         $departure = TourDeparture::where('guide_id', $user->id)
//             ->with(['tour', 'bookings.user'])
//             ->findOrFail($departureId);

//         $bookings = $departure->bookings()
//             ->where('status', '!=', 'cancelled')
//             ->with([
//                 'user',
//                 'checkIns' => function ($query) use ($departureId) {
//                     $query->where('departure_id', $departureId)
//                         ->orderByDesc('check_in_time');
//                 }
//             ])
//             ->get();

//         return view('guide.check-ins.index', compact('departure', 'bookings'));
//     }

//     /**
//      * Check-in một booking
//      */
//     public function store(Request $request, $departureId)
//     {
//         $user = auth()->user();

//         // Chặn guide không đúng departure
//         TourDeparture::where('guide_id', $user->id)->findOrFail($departureId);

//         $validated = $request->validate([
//             'booking_id' => ['required', 'exists:bookings,id'],
//             // datetime-local gửi dạng 2025-12-22T03:41 => validate đúng format này
//             'check_in_time' => ['required', 'date_format:Y-m-d\TH:i'],
//             'check_in_location' => ['nullable', 'string', 'max:255'],
//             'status' => ['required', 'in:checked_in,checked_out,absent'],
//             'notes' => ['nullable', 'string', 'max:1000'],
//         ]);

//         // Kiểm tra booking thuộc departure này
//         Booking::where('id', $validated['booking_id'])
//             ->where('departure_id', $departureId)
//             ->firstOrFail();

//         CheckIn::create([
//             'departure_id' => $departureId,
//             'booking_id' => $validated['booking_id'],
//             'checked_by' => $user->id,
//             'check_in_time' => $validated['check_in_time'],
//             'check_in_location' => $validated['check_in_location'] ?? null,
//             'status' => $validated['status'],
//             'notes' => $validated['notes'] ?? null,
//         ]);

//         // ĐỔI expectsJson -> wantsJson/ajax để fetch luôn nhận JSON ổn định
//         if ($request->wantsJson() || $request->ajax()) {
//             return response()->json([
//                 'success' => true,
//                 'message' => 'Đã ghi nhận check-in thành công.'
//             ]);
//         }

//         return redirect()
//             ->route('guide.check-ins.index', $departureId)
//             ->with('success', 'Đã ghi nhận check-in thành công.');
//     }

//     /**
//      * Lấy thông tin check-in để edit (JSON)
//      */
//     public function show($departureId, $checkInId)
//     {
//         $user = auth()->user();

//         $checkIn = CheckIn::where('departure_id', $departureId)
//             ->where('checked_by', $user->id)
//             ->findOrFail($checkInId);

//         return response()->json([
//             'id' => $checkIn->id,
//             'check_in_time' => optional($checkIn->check_in_time)->format('Y-m-d\TH:i'),
//             'check_in_location' => $checkIn->check_in_location,
//             'status' => $checkIn->status,
//             'notes' => $checkIn->notes,
//         ]);
//     }

//     /**
//      * Cập nhật check-in
//      */
//     public function update(Request $request, $departureId, $checkInId)
//     {
//         $user = auth()->user();

//         $checkIn = CheckIn::where('departure_id', $departureId)
//             ->where('checked_by', $user->id)
//             ->findOrFail($checkInId);

//         $validated = $request->validate([
//             'check_in_time' => ['required', 'date_format:Y-m-d\TH:i'],
//             'check_in_location' => ['nullable', 'string', 'max:255'],
//             'status' => ['required', 'in:checked_in,checked_out,absent'],
//             'notes' => ['nullable', 'string', 'max:1000'],
//         ]);

//         $checkIn->update($validated);

//         if ($request->wantsJson() || $request->ajax()) {
//             return response()->json([
//                 'success' => true,
//                 'message' => 'Đã cập nhật check-in thành công.'
//             ]);
//         }

//         return redirect()
//             ->route('guide.check-ins.index', $departureId)
//             ->with('success', 'Đã cập nhật check-in thành công.');
//     }

//     /**
//      * Xóa check-in
//      */
//     public function destroy($departureId, $checkInId)
//     {
//         $user = auth()->user();

//         $checkIn = CheckIn::where('departure_id', $departureId)
//             ->where('checked_by', $user->id)
//             ->findOrFail($checkInId);

//         $checkIn->delete();

//         if (request()->wantsJson() || request()->ajax()) {
//             return response()->json(['success' => true]);
//         }

//         return redirect()
//             ->route('guide.check-ins.index', $departureId)
//             ->with('success', 'Đã xóa check-in thành công.');
//     }
// }




namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use App\Models\TourDeparture;
use App\Models\BookingPassenger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RollCallController extends Controller
{
    /**
     * Màn hình điểm danh đoàn (theo HÀNH KHÁCH)
     */
    public function index($departureId): View
    {
        $user = auth()->user();

        // Kiểm tra departure thuộc HDV và load dữ liệu
        $departure = TourDeparture::where('guide_id', $user->id)
            ->with([
                'tour',
                'bookings' => fn($q) => $q->where('status', '!=', 'cancelled'),
                'bookings.user',
                'bookings.passengers',
                'bookings.passengers.checkIns' => fn($q) =>
                $q->where('departure_id', $departureId)
            ])
            ->findOrFail($departureId);

        /**
         * ⛔ KHÔNG CHO TRUY CẬP VÀO CHECK-IN NẾU TOUR ĐÃ COMPLETED
         */
        // if ($departure->status === 'completed') {
        //     return redirect()
        //         ->route('guide.departures.show', $departureId)
        //         ->with('error', 'Tour đã kết thúc. Bạn không thể vào điểm danh nữa.');
        // }

        $passengers = $departure->bookings->flatMap->passengers;

        return view('guide.check-ins.index', compact('departure', 'passengers'));
    }


    /**
     * Tick / bỏ tick check-in cho 1 hành khách
     */
    public function store(Request $request, $departureId)
    {
        $user = auth()->user();

        // Bảo vệ: chỉ HDV của tour mới được check-in
        TourDeparture::where('guide_id', $user->id)->findOrFail($departureId);

            $departure = TourDeparture::where('guide_id', $user->id)
        ->findOrFail($departureId);

        $validated = $request->validate([
            'passenger_id' => ['required', 'exists:booking_passengers,id'],
            'status'       => ['required', 'in:checked_in,absent'],
            'check_in_time'  => ['required', 'date'],
        ]);


        // ⭐ Parse ngày giờ check-in
        $checkInTime = Carbon::parse($request->check_in_time);

        // Ngày tour bắt đầu
        $tourStart = $departure->departure_date->copy()->startOfDay();

        // Ngày tour kết thúc = ngày bắt đầu + số ngày tour - 1
        $tourEnd = $departure->departure_date
            ->copy()
            ->addDays($departure->tour->duration_days - 1)
            ->endOfDay();

        // ❌ Không cho check-in trước ngày bắt đầu tour
        if ($checkInTime->lt($tourStart)) {
            return back()->with('error', 'Không thể check-in trước ngày tour bắt đầu.');
        }

        // ❌ Không cho check-in sau khi tour đã kết thúc
        if ($checkInTime->gt($tourEnd)) {
            return back()->with('error', 'Không thể check-in sau khi tour đã kết thúc.');
        }

        // ❌ Không cho check-in tương lai
        if ($checkInTime->gt(now())) {
            return back()->with('error', 'Thời gian check-in không thể vượt quá hiện tại.');
        }

        // Kiểm tra hành khách thuộc departure
        $passenger = BookingPassenger::where('id', $validated['passenger_id'])
            ->whereHas('booking', function ($q) use ($departureId) {
                $q->where('departure_id', $departureId)
                    ->where('status', '!=', 'cancelled');
            })
            ->firstOrFail();

        // Tạo hoặc cập nhật check-in
        CheckIn::updateOrCreate(
            [
                'departure_id' => $departureId,
                'passenger_id' => $passenger->id,
            ],
            [
                'booking_id'    => $passenger->booking_id,
                'checked_by'    => $user->id,
                'status'        => $validated['status'],
                'check_in_time' => now(),
            ]
        );

        return redirect()
            ->back()
            ->with('success', 'Đã cập nhật điểm danh.');
    }


    /**
     * Kết thúc tour và khóa điểm danh
     */
    public function complete(Request $request, $departureId)
    {
        $user = auth()->user();

        $departure = TourDeparture::where('id', $departureId)
            ->where('guide_id', $user->id)
            ->firstOrFail();

        // Không cho kết thúc lại
        if ($departure->status === 'completed') {
            return redirect()
                ->route('guide.departures.show', $departureId)
                ->with('error', 'Tour đã kết thúc trước đó.');
        }

        // Phải có ít nhất 1 khách check-in
        $checkedInCount = CheckIn::where('departure_id', $departureId)
            ->where('status', 'checked_in')
            ->count();

        if ($checkedInCount == 0) {
            return redirect()
                ->route('guide.roll-calls.index', $departureId)
                ->with('error', 'Chưa có hành khách nào check-in.');
        }

        // Cập nhật trạng thái
        $departure->update([
            'tour_status' => 'completed',
            'completed_at' => now()
        ]);

        // Redirect về trang chi tiết tour
        return redirect()
            ->route('guide.departures.show', $departureId)
            ->with('success', 'Tour đã kết thúc thành công!');
    }



    /**
     * Xóa check-in (tùy chọn)
     */
    public function destroy($departureId, $checkInId)
    {
        $user = auth()->user();

        $checkIn = CheckIn::where('departure_id', $departureId)
            ->where('checked_by', $user->id)
            ->findOrFail($checkInId);

        $checkIn->delete();

        return response()->json(['success' => true]);
    }
}
