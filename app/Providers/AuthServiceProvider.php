<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\Investment;
use App\Models\Loan;
use App\Policies\AccountPolicy;
use App\Policies\TransactionPolicy;
use App\Policies\InvestmentPolicy;
use App\Policies\LoanPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::policy(Transaction::class, TransactionPolicy::class);
        Gate::policy(Account::class, AccountPolicy::class);
        Gate::policy(Investment::class, InvestmentPolicy::class);
        Gate::policy(Loan::class, LoanPolicy::class);
    }
}
