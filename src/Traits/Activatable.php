<?php
namespace Wisevision\LaravelEssentials\Traits;

trait Activatable
{


    public function scopeActive($query)
    {
        return $query->where( $this->getAactivatebleColumn(), 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function activate()
    {
        $this->active = 1;
        $this->save();
    }

    public function deactivate()
    {
        $this->active = 0;
        $this->save();
    }

    public function toggle()
    {
        $this->active = !$this->active;
        $this->save();
    }

    private function getAactivatebleColumn()
    {
        return $this->activateble_column ?? 'active';
    }
}
