<?php

namespace App\Providers;

use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (class_exists(ServeCommand::class)) {
            $allKeys = array_unique(array_merge(
                ServeCommand::$passthroughVariables,
                array_keys($_SERVER),
                array_keys($_ENV),
                array_keys(getenv()),
                [
                    'SystemRoot', 'SYSTEMROOT', 'systemroot',
                    'Path', 'PATH', 'path',
                    'windir', 'WINDIR', 'WinDir',
                    'TEMP', 'TMP', 'Temp', 'Tmp',
                    'LOCALAPPDATA', 'APPDATA', 'LocalAppData', 'AppData',
                    'USERPROFILE', 'HOMEDRIVE', 'HOMEPATH', 'UserProfile',
                    'ProgramData', 'ProgramFiles', 'CommonProgramFiles',
                    'COMSPEC', 'PATHEXT', 'SystemDrive', 'ComSpec',
                ]
            ));
            ServeCommand::$passthroughVariables = $allKeys;
        }
    }
}
