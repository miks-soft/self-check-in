<?php


namespace GettSleep\Frontdesk\Request;

use GettSleep\Frontdesk\Collection\Reserves;

class CreateOrderRequest extends Request {
    protected string $path = '/externalPrices/CreateOrder.aspx';
    protected string $method = 'POST';

    public function __construct(
        protected string    $url,
        protected string    $token,
        protected Reserves  $reserves
    ) {
        $this->path = $this->url . $this->path;
    }

    public function toArray() {
        $data = [];
        foreach ($this->reserves as $reserve) {
            /**@var \GettSleep\Frontdesk\Model\Reserve $reserve */
            $reserveData = [
                'arrival' => $reserve->getArrival()->format('Y-m-d'),
                'timeArrival' => $reserve->getArrival()->format('H:i'),
                'departure' => $reserve->getDepart()->format('Y-m-d'),
                'timeDeparture' => $reserve->getDepart()->format('H:i'),
                'adults' => $reserve->getAdults(),
                'children' => $reserve->getChildren(),
                'ages' => $reserve->getAges(),
                'byBedsVariant' => $reserve->isByBedsVariant(),
                'roomId' => $reserve->getRoomId(),
                'count' => $reserve->getCount(),
                'tariffId' => $reserve->getTariffId(),
                'boardingId' => $reserve->getBoardingId(),
                'amount' => $reserve->getAmount(),
                'payed' => $reserve->getPayed(),
                'paymentType' => $reserve->getPaymentType(),
                'contactName' => $reserve->getContactName(),
                'contactPhone' => $reserve->getContactPhone(),
                'contactEmail' => $reserve->getContactEmail(),
                'byRequest' => $reserve->isByRequest(),
                'comment' => $reserve->getComment(),
                'source' => $reserve->getSource(),
            ];

            for ($i = 0; $i < $reserve->getCount(); $i++) {
                $reserveData["guests"][] = [
                    "surname"=> $reserve->getContactSurname(),
                    "name"=> $reserve->getContactName(),
                    "phone"=> $reserve->getContactPhone(),
                    "email"=> $reserve->getContactEmail()
                ];
            }

            $data[] = $reserveData;
        }

        return [
            'token' => $this->token,
            'data' => \json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        ];
    }
}

