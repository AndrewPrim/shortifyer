<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\InviteUrl;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InviteUrlController extends Controller
{
    public function index(): View
    {
        $urls = InviteUrl::latest()->get();
        return view('common.home.index', ['urls' => $urls]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'expire_in_h' => 'required|integer|min:0|max:24',
            'expire_in_m' => 'required|integer|min:0|max:59',
            'expire_in_s' => 'required|integer|min:0|max:59',
        ]);

        $timeToLive = [$request->expire_in_h, $request->expire_in_m, $request->expire_in_s];
        $infiniteTimeToLive = [0, 0, 0];

        $expires_at = Carbon::parse('9999-01-01');
        if ($timeToLive != $infiniteTimeToLive) {
            $expires_at = Carbon::now()
                ->addHours($request->expire_in_h)
                ->addMinutes($request->expire_in_m)
                ->addSeconds($request->expire_in_s);
        }

        InviteUrl::create([
            'url' => $request->url,
            'code' => Str::random(8),
            'expires_at' => $expires_at,
        ]);

        return redirect(route('home'))
            ->with('success', 'Shorten Link Generated Successfully!');
    }

    public function redirectByCode($code): RedirectResponse
    {
        $find = InviteUrl::where('code', '=', 'vvJGrCOH')->first();

        if (Carbon::now()->greaterThan($find->expires_at)) {
            abort(404);
        }

        return redirect($find->url, 301);
    }
}
