<?php

namespace App\Queries;

use Auth;
use stdclass;
use Illuminate\Support\Facades\DB;

class BasicQuery
{
    public function getIndex($condition=null)
    {
        return $this->indexRecord($condition);
    }

    public function getRecordById($id, $condition=null)
    {
        return $this->findRecordById($id, $condition);
    }

    public function getRecord($condition)
    {
        return $this->findRecord($condition);
    }

    public function getRecords($condition)
    {
        return $this->allRecord($condition);
    }

    public function setTable($data)
    {
        return $this->saveTable($data);
    }

    public function setDestroy($data)
    {
        return $this->destroyRecord($data);
    }

    protected function storeData($request, $datetime, $datarequest)
    {
        $data = ['mode' => 'store', 'datetime' => $datetime, 'userid' => Auth::user()->id, 'datarequest' => $datarequest];
        return $this->setTable($data);
    }

    protected function updateData($id, $request, $datetime, $datarequest)
    {
        $data = ['mode' => 'update', 'id' => $id, 'datetime' => $datetime, 'userid' => Auth::user()->id, 'datarequest' => $datarequest];
        return $this->setTable($data);            
    }

    protected function deleteData($id, $datetime, $datarequest)
    {
        $data = ['mode' => 'soft', 'id' => $id, 'datetime' => $datetime, 'userid' => Auth::user()->id, 'datarequest' => $datarequest];
        return $this->setDestroy($data);
    }

    protected function destroyData($id)
    {
        $data = ['mode' => 'hard', 'id' => $id];
        return $this->setDestroy($data);
    }

    protected function newEntity()
    {
        return (new stdclass());
    }

    protected function indexRecord($condition)
    {
        $query = $this->newEntity();
        
        if(isset($condition['status']))
        {
            $query = $query->where('status','=',$condition['status']);
        }

        return $query->get();
    }

    protected function findRecordById($id, $condition=null)
    {
        $query = $this->newEntity();
        if(isset($condition)){
            foreach ($condition as $key => $value) {
                if($key=='select')
                    $query = $query->select($value);
            }            
        }
        $query = $query->find($id);
        return $query;
    }

    protected function findRecord($condition)
    {
        $query = $this->newEntity();
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }
        $query = $query->first();
        return $query;
    }

    protected function listRecord($condition,$id1,$id2)
    {
        $query = $this->newEntity();
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }
        $query = $query->lists($id1,$id2);
        return $query;
    }

    protected function allRecord($condition)
    {
        $query = $this->newEntity();
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }
        $query = $query->get();
        return $query;
    }

    protected function saveTable($data)
    {
        if($data['mode'] == 'store')
        {
            $entity = $this->newEntity();
            $entity->createdby = $data['userid'];
            $entity->createdtime = $data['datetime'];
        }
        elseif($data['mode'] == 'update') 
        {
            $entity = $this->findRecordById($data['id']);
            $entity->changedby = $data['userid'];
            $entity->changedtime = $data['datetime'];
        }
        else
        {
            return null;
        }

        $datafilter =  array_filter($data['datarequest'], function($var){
                    return $var;
                    } 
                );
        foreach ($datafilter as $key => $value)
        {
            $entity->$key = $value;                    
        }
//            $entity->status = 'active';
//        DB::transaction(function ($entity) {
        $entity->save();
//        });
        return $entity;
    }

    protected function destroyRecord($data)
    {
        if($data['mode'] == 'soft')
        {
 //           DB::transaction(function () {
            $entity = $this->findRecordById($data['id']);

            $datafilter =  array_filter($data['datarequest'], function($var){
                        return $var;
                        } 
                    );
            foreach ($datafilter as $key => $value)
            {
                $entity->$key = $value;                    
            }
//            $entity->status = 'inactive';
            $entity->deletedby = $data['userid'];
            $entity->deletedtime = $data['datetime'];
            $entity = $entity->save();
 //           });
            return $entity;
        }
        elseif($data['mode'] == 'hard')
        {
//            DB::transaction(function () {
            $entity = $this->newEntity();
            $entity = $entity->destroy($data['id']);
//            });
            return $entity;
        }
        else
        {
            return false;
        }
    }

    /* ------------------ in research --------------------------------*/
    // ['where' => ['=' => ['fields' => 'value']]]
    protected function queryGenerator()
    {
        foreach ($condition as $key => $value)
        {
            if($key == 'where')
            {
                foreach ($value as $key2 => $value2)
                {
                    foreach ($value2 as $key3 => $value3) {
                        $query = $query->where($key2,$key,$value2);
                    }
                }
            }
        }
        $query = $this->executeQuery($query);
    }

    protected function executeQuery($query, $condition=null)
    {
        //get
        //plucks
        return $query->get();
    }
}