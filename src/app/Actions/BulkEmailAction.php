<?php

namespace App\Actions;

use App\Jobs\SendQueueEmail;
use App\Models\API\Member;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use TCG\Voyager\Actions\AbstractAction;

/**
 * Class BulkEmailAction
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class BulkEmailAction extends AbstractAction
{
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Bulk Send Email';
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return 'voyager-documentation';
    }

    /**
     * @return string
     */
    public function getPolicy(): string
    {
        return 'read';
    }

    /**
     * @return string[]
     */
    public function getAttributes(): array
    {
        return [
            'class' => 'btn btn-sm btn-info',
        ];
    }

    /**
     * @return string
     */
    public function getDefaultRoute(): string
    {
        return route('voyager.login');
    }

    /**
     * @param $ids
     * @param $comingFrom
     * @return Application|RedirectResponse|Redirector
     */
    public function massAction($ids, $comingFrom): Redirector|RedirectResponse|Application
    {
        $members = Member::wherein('id',$ids)->get();

        $job = (new SendQueueEmail($members))
            ->delay(now()->addSeconds(2));

        dispatch($job);
        echo "Mail send successfully !!";

        return redirect()->back();
    }

    /**
     * @return bool
     */
    public function shouldActionDisplayOnDataType(): bool
    {
        return $this->dataType->slug == 'members';
    }
}