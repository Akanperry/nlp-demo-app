<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Brick\VarExporter\VarExporter;

class SettingsController extends Controller
{
    /**
     * Display the company info edit view.
     */
    public function createCompanyInfo(): View
    {
        return view('settings.company-info');
    }

    /**
     * Display the company logos edit view.
     */
    public function createCompanyLogo(): View
    {
        return view('settings.company-logo');
    }

    /**
     * Display the company soacials edit view.
     */
    public function createSocailMediaHandles(): View
    {
        return view('settings.company-socials');
    }

    /**
     * Display the company smtp edit view.
     */
    public function createSMTPConfig(): View
    {
        return view('settings.company-smtp');
    }

    /**
     * Update company smtp.
     */
    public function storeSMTPConfig(Request $request): RedirectResponse
    {
        $request->validate([
            'host' => ['required', 'string'],
            'port' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'mail_from' => ['required', 'string'],
            'encryption' => ['required', 'string'],
        ]);

        $config = (object) config('mail');

        $config->mailers['smtp']['host'] = $request->get('host');
        $config->mailers['smtp']['port'] = $request->get('port');
        $config->mailers['smtp']['username'] = $request->get('username');
        $config->mailers['smtp']['password'] = $request->get('password');
        $config->mailers['smtp']['encryption'] = $request->get('encryption');
        $config->mailers['smtp']['url'] = $request->get('url');
        $config->from['address'] = $request->get('mail_from');

        $newConfig = VarExporter::export((array) $config, VarExporter::ADD_RETURN );

        if( \Illuminate\Support\Facades\File::put(base_path() . '/config/mail.php', "<?php\n\n ". $newConfig) ) {
                
            \Illuminate\Support\Facades\Artisan::call('config:clear');
    
            return redirect(route('admin.settings.company.smtp'))->with('success', 'Settings updated Successfully!');
    
        }

        return redirect(route('admin.settings.company.smtp'))->with('error', 'An error occured, try again!');
    }

    /**
     * Update company information.
     */
    public function storeCompanyInfo(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phonenumber' => ['required', 'string'],
            'address' => ['required', 'string'],
            'tagline' => ['required', 'string'],
            'website' => ['required', 'string'],
        ]);

        $config = (object) config('company');

        $config->company_name = $request->get('name');
        $config->company_email = $request->get('email');
        $config->company_phonenumber = $request->get('phonenumber');
        $config->company_address = $request->get('address');
        $config->company_tagline = $request->get('tagline');
        $config->contact_email = $request->get('contact_email');
        $config->claims_email = $request->get('claims_email');
        $config->app_url = $request->get('website');

        $newConfig = VarExporter::export((array) $config, VarExporter::ADD_RETURN );

        if( \Illuminate\Support\Facades\File::put(base_path() . '/config/company.php', "<?php\n\n ". $newConfig) ) {
                
            \Illuminate\Support\Facades\Artisan::call('config:clear');
    
            return redirect(route('admin.settings.company.info'))->with('success', 'Settings updated Successfully!');
    
        }

        return redirect(route('admin.settings.company.info'))->with('error', 'An error occured, try again!');

    }

    /**
     * Update company smtp.
     */
    public function storeSocailMediaHandles(Request $request): RedirectResponse
    {
        $request->validate([
            'facebook' => ['required', 'url', 'string'],
            'instagram' => ['required', 'url', 'string'],
            'twitter' => ['required', 'url', 'string'],
            'linkedin' => ['required', 'url', 'string'],
        ]);

        $config = (object) config('company');

        $config->facebook = $request->get('facebook');
        $config->instagram = $request->get('instagram');
        $config->twitter = $request->get('twitter');
        $config->linkedin = $request->get('linkedin');

        $newConfig = VarExporter::export((array) $config, VarExporter::ADD_RETURN );

        if( \Illuminate\Support\Facades\File::put(base_path() . '/config/company.php', "<?php\n\n ". $newConfig) ) {
                
            \Illuminate\Support\Facades\Artisan::call('config:clear');
    
            return redirect(route('admin.settings.company.socials'))->with('success', 'Settings updated Successfully!');
    
        }

        return redirect(route('admin.settings.company.socials'))->with('error', 'An error occured, try again!');
    }

    /**
     * Update company logo_1.
     */
    public function storeCompanyLogo1(Request $request): RedirectResponse
    {
        if(!$request->hasFile('logo_1')){
            $image = "";
        } else {
            if($request->logo_1->isValid()){
                $image = $request->file('logo_1')->storeAs('img', 'ridera-logo.png', 'public');
            }else{
                $image = "";
            }
        }

        $config = (object) config('company');

        $config->app_logo_1 = $image;
        $config->app_favicon = $favicon_image;

        $newConfig = VarExporter::export((array) $config, VarExporter::ADD_RETURN );

        if( \Illuminate\Support\Facades\File::put(base_path() . '/config/company.php', "<?php\n\n ". $newConfig) ) {
                
            \Illuminate\Support\Facades\Artisan::call('config:clear');
    
            return redirect(route('admin.settings.company.logo'))->with('success', 'Settings updated Successfully!');
    
        }

        return redirect(route('admin.settings.company.logo'))->with('error', 'An error occured, try again!');
    }

    /**
     * Update company logo_2.
     */
    public function storeCompanyLogo2(Request $request): RedirectResponse
    {
        if(!$request->hasFile('logo_2')){
            $image = "";
        } else {
            if($request->logo_2->isValid()){
                $image = $request->file('logo_2')->storeAs('img', 'ridera-alt.png', 'public');
            }else{
                $image = "";
            }
        }

        $config = (object) config('company');

        $config->app_logo_2 = $image;

        $newConfig = VarExporter::export((array) $config, VarExporter::ADD_RETURN );

        if( \Illuminate\Support\Facades\File::put(base_path() . '/config/company.php', "<?php\n\n ". $newConfig) ) {
                
            \Illuminate\Support\Facades\Artisan::call('config:clear');
    
            return redirect(route('admin.settings.company.logo'))->with('success', 'Settings updated Successfully!');
    
        }

        return redirect(route('admin.settings.company.logo'))->with('error', 'An error occured, try again!');
    }
}
