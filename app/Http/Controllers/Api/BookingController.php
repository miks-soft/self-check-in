<?php

namespace App\Http\Controllers\Api;

use App\Contracts\BookingServiceContract;
use App\DTO\Factories\AnnulateBookingActionDTOFactory;
use App\DTO\Factories\AnnulateBookingWrapperDTOFactory;
use App\DTO\Factories\BookingWrapperDTOFactory;
use App\DTO\Factories\CheckPaymentStatusActionDTOFactory;
use App\DTO\Factories\CheckPrintStatusActionDTOFactory;
use App\DTO\Factories\FindRoomsActionDTOFactory;
use App\DTO\Factories\MakeBookingActionDTOFactory;
use App\DTO\Factories\PaymentWrapperDTOFactory;
use App\DTO\Factories\PrintActionDTOFactory;
use App\DTO\Factories\PrintWrapperDTOFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnulateBookingRequest;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\FindRoomsRequest;
use App\Http\Requests\PaymentStatusRequest;
use App\Http\Requests\PrintRequest;
use App\Http\Requests\PrintStatusRequest;

class BookingController extends Controller
{
    protected BookingServiceContract $bookingService;

    public function __construct(BookingServiceContract $bookingService){
        $this->bookingService = $bookingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function paysystems()
    {
        return $this->respondWithSuccess(
            $this->bookingService->paysystems()
        );
    }

    public function rooms(FindRoomsRequest $findRoomRequest)
    {
        return $this->respondWithSuccess(
            $this->bookingService->availableRooms(
                app(FindRoomsActionDTOFactory::class)->make($findRoomRequest)
            )
        );
    }

    public function putBooking(BookingRequest $bookingRequest) {
        return $this->respondCreated(
            app(BookingWrapperDTOFactory::class)->make(
                $this->bookingService->book(
                    app(MakeBookingActionDTOFactory::class)->make($bookingRequest)
                )
            )
        );
    }

    public function paymentStatus(PaymentStatusRequest $request)
    {
        return $this->respondWithSuccess(
            app(PaymentWrapperDTOFactory::class)->make(
                $this->bookingService->paymentStatus(
                    app(CheckPaymentStatusActionDTOFactory::class)->make($request)
                )
            )
        );
    }

    public function print(PrintRequest $request)
    {
        return $this->respondCreated(
            app(PrintWrapperDTOFactory::class)->make(
                $this->bookingService->print(
                    app(PrintActionDTOFactory::class)->make($request)
                )
            )
        );
    }

    public function printStatus(PrintStatusRequest $request)
    {
        return $this->respondWithSuccess(
            app(PrintWrapperDTOFactory::class)->make(
                $this->bookingService->printStatus(
                    app(CheckPrintStatusActionDTOFactory::class)->make($request)
                )
            )
        );
    }

    public function annulateBooking(AnnulateBookingRequest $annulateOrderRequest) {
        return $this->respondWithSuccess(
            app(AnnulateBookingWrapperDTOFactory::class)->make(
                $this->bookingService->annulateBooking(
                    app(AnnulateBookingActionDTOFactory::class)->make($annulateOrderRequest)
                )
            )
        );
    }
}
