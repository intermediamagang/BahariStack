<?php

namespace App\Http\Controllers;

use App\Models\BrandSetting;
use App\Models\Service;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\TeamMember;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brandSetting = BrandSetting::first();
        $services = Service::active()->ordered()->get();
        $packages = Package::active()->ordered()->get();
        $portfolios = Portfolio::active()->featured()->ordered()->take(6)->get();
        $teamMembers = TeamMember::active()->ordered()->take(4)->get();
        $contactInfos = ContactInfo::active()->ordered()->get();

        // Statistik dari data yang ada
        $stats = [
            'projects_completed' => Portfolio::active()->count(),
            'happy_clients' => Portfolio::active()->distinct('client_name')->count(),
            'team_members' => TeamMember::active()->count(),
            'services_offered' => Service::active()->count(),
        ];

        return view('home', compact(
            'brandSetting',
            'services',
            'packages',
            'portfolios',
            'teamMembers',
            'contactInfos',
            'stats'
        ));
    }

    public function services()
    {
        $brandSetting = BrandSetting::first();
        $services = Service::active()->ordered()->get();
        $contactInfos = ContactInfo::active()->ordered()->get();

        return view('services', compact('brandSetting', 'services', 'contactInfos'));
    }

    public function packages()
    {
        $brandSetting = BrandSetting::first();
        $websitePackages = Package::active()->byType('website')->ordered()->get();
        $softwarePackages = Package::active()->byType('software')->ordered()->get();
        $mobilePackages = Package::active()->byType('mobile_app')->ordered()->get();
        $contactInfos = ContactInfo::active()->ordered()->get();

        return view('packages', compact(
            'brandSetting',
            'websitePackages',
            'softwarePackages',
            'mobilePackages',
            'contactInfos'
        ));
    }

    public function portfolio()
    {
        $brandSetting = BrandSetting::first();
        $portfolios = Portfolio::active()->ordered()->get();
        $contactInfos = ContactInfo::active()->ordered()->get();

        return view('portfolio', compact('brandSetting', 'portfolios', 'contactInfos'));
    }

    public function team()
    {
        $brandSetting = BrandSetting::first();
        $teamMembers = TeamMember::active()->ordered()->get();
        $contactInfos = ContactInfo::active()->ordered()->get();

        return view('team', compact('brandSetting', 'teamMembers', 'contactInfos'));
    }

    public function contact()
    {
        $brandSetting = BrandSetting::first();
        $contactInfos = ContactInfo::active()->ordered()->get();

        return view('contact', compact('brandSetting', 'contactInfos'));
    }
}
