<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class RoomsBedsDataRow extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'rooms');
        if ($dataType->exists) {
            //Data Rows
            $dataRow = $this->dataRow($dataType, 'beds');
            if (!$dataRow->exists) {
                $dataRow->fill([
                    'type'         => 'number',
                    'display_name' => __('seeders.data_rows.rooms_beds'),
                    'required'     => 1,
                    'browse'       => 1,
                    'read'         => 1,
                    'edit'         => 1,
                    'add'          => 1,
                    'delete'       => 1,
                    'order'        => 3,
                ])->save();

                $this->translate($dataRow, [
                    'display_name' => __('seeders.data_rows.rooms_beds', [], 'en'),
                ], 'en');
            }
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }

    protected function translate($model, $fields, $locale) {
        $model = $model->translate($locale);

        foreach ($fields as $field => $value) {
            $model->{$field} = $value;
        }

        $model->save();
    }
}
