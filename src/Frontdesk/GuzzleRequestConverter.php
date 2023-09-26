<?php


namespace GettSleep\Frontdesk;

use GettSleep\Frontdesk\Request\Request;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;

class GuzzleRequestConverter implements RequestConverter {
    public function convert(Request $request): RequestInterface {
        return match ($request->getMethod()) {
            'GET' => $this->convertGet($request),
            'POST' => $this->convertPost(($request)),
        };
    }

    protected function convertGet(Request $request): \GuzzleHttp\Psr7\Request {
        return new \GuzzleHttp\Psr7\Request(
            $request->getMethod(),
            implode('?', [$request->getPath(), \http_build_query($request->toArray(), '', '&', \PHP_QUERY_RFC3986)])
        );
    }

    protected function convertPost(Request $request): \GuzzleHttp\Psr7\Request {
        /*$postData = $request->toArray();

        $multipart = [];
        $vars = explode('&', http_build_query($postData));
        foreach ($vars as $var) {
            list($nameRaw, $contentsRaw) = explode('=', $var);
            $name = urldecode($nameRaw);
            $contents = urldecode($contentsRaw);
            $multipart[] = ['name' => $name, 'contents' => $contents];
        }*/

        return new \GuzzleHttp\Psr7\Request(
            $request->getMethod(),
            $request->getPath(),
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            Utils::streamFor(\http_build_query($request->toArray(), '', '&'))
        );
//        var_dump($requestg->getBody()->getContents());
//        die();
    }
}
