<?php

namespace App\Actions;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use TCG\Voyager\Actions\AbstractAction;

/**
 * Class MyAction
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class MyAction extends AbstractAction
{
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Export Excel';
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
            'class' => 'btn btn-sm btn-success pull-right',
        ];
    }

    /**
     * @return string
     */
    public function getDefaultRoute(): string
    {
        return route('voyager.export.member');
    }

    /**
     * @param $ids
     * @param $comingFrom
     * @return Application|RedirectResponse|Redirector
     */
    public function massAction($ids, $comingFrom): Redirector|RedirectResponse|Application
    {
        return redirect(route('voyager.export.member'));
    }

    /**
     * @return bool
     */
    public function shouldActionDisplayOnDataType(): bool
    {
        return $this->dataType->slug == 'members';
    }
}