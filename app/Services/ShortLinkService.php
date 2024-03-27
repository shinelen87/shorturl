<?php

namespace App\Services;

use App\Models\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ShortLinkService
{
    /**
     * Create a new short link.
     *
     * @param array $data
     * @return ShortLink
     */
    public function createShortLink(array $data): ShortLink
    {
        $code = $this->generateUniqueCode();

        return ShortLink::create([
            'url' => $data['url'],
            'code' => $code,
            'expires_at' => $data['expires_at'] ?? null
        ]);
    }

    /**
     * Get short link by code.
     *
     * @param string $code
     * @return ShortLink
     */
    public function getShortLinkByCode(string $code): ShortLink
    {
        return ShortLink::where('code', $code)->firstOrFail();
    }

    /**
     * Redirect to the original URL.
     *
     * @param string $code
     * @return RedirectResponse
     */
    public function redirectShortLink(string $code): RedirectResponse
    {
        $shortLink = $this->getShortLinkByCode($code);

        if ($shortLink->expires_at && $shortLink->expires_at->isPast()) {
            return Redirect::route('home')->with('error', 'The link is expired.');
        }

        $shortLink->increment('counter');

        return Redirect::to($shortLink->url);
    }

    /**
     * Get short link stats.
     *
     * @param string $code
     * @return View
     */
    public function getShortLinkStats(string $code): View
    {
        $shortLink = $this->getShortLinkByCode($code);

        return view('url_clicks', [
            'shortUrl' => route('stats', ['code' => $shortLink->code]),
            'clicksCount' => $shortLink->counter,
        ]);
    }

    /**
     * Generate a unique code for a short link.
     *
     * @return string
     */
    protected function generateUniqueCode(): string
    {
        $code = Str::random(6);

        while (ShortLink::where('code', $code)->exists()) {
            $code = Str::random(6);
        }

        return $code;
    }
}
