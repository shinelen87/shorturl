<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ShortLinkService;

class ShortLinkController extends Controller
{
    protected $shortLinkService;

    public function __construct(ShortLinkService $shortLinkService)
    {
        $this->shortLinkService = $shortLinkService;
    }

    /**
     * Show the form for creating a new short link.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'url' => 'required|url|max:2048',
            'expires_at' => 'nullable|date'
        ]);

        $shortLink = $this->shortLinkService->createShortLink($data);

        return redirect()->route('short-links.show', ['code' => $shortLink->code]);
    }

    /**
     * Display the shortened URL.
     * @param string $code
     * @return View
     */
    public function show(string $code): View
    {
        $shortLink = $this->shortLinkService->getShortLinkByCode($code);
        return view('shortened', [
            'shortenedUrl' => url('/' . $code),
            'originalUrl' => $shortLink->url,
            'code' => $code
        ]);
    }

    /**
     * Redirect to the original URL.
     * @param string $code
     * @return RedirectResponse
     */
    public function redirect(string $code): RedirectResponse
    {
        return $this->shortLinkService->redirectShortLink($code);
    }

    /**
     * Get the statistics of the short link.
     * @param string $code
     * @return View
     */
    public function stats(string $code): View
    {
        return $this->shortLinkService->getShortLinkStats($code);
    }
}
