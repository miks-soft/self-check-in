<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Paysystem;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class BookingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'bookings');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'bookings',
                'display_name_singular' => __('seeders.data_types.booking.singular'),
                'display_name_plural'   => __('seeders.data_types.booking.plural'),
                'icon'                  => 'voyager-calendar',
                'model_name'            => 'App\\Models\\Booking',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();

            $this->translate($dataType, [
                'display_name_singular' => __('seeders.data_types.booking.singular', [], 'en'),
                'display_name_plural'   => __('seeders.data_types.booking.plural', [], 'en'),
            ], 'en');
        }

        //Data Rows
        $dataType = DataType::where('slug', 'bookings')->firstOrFail();
        $dataRow = $this->dataRow($dataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'fd24_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('seeders.data_rows.fd24_id'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.fd24_id', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'contact_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.contact_id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => 3,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.contact_id', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'paysystem_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.paysystem_id'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.paysystem_id', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'date_in');
        if ($dataRow->exists) {
            $dataRow->delete();
        }

/*        $dataRow = $this->dataRow($dataType, 'time_in');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'time',
                'display_name' => __('seeders.data_rows.time_in'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 7,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.time_in', [], 'en'),
            ], 'en');
        }*/

        $dataRow = $this->dataRow($dataType, 'date_out');
        if ($dataRow->exists) {
            $dataRow->delete();
        }

/*        $dataRow = $this->dataRow($dataType, 'time_out');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'time',
                'display_name' => __('seeders.data_rows.time_out'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 9,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.time_out', [], 'en'),
            ], 'en');
        }*/

        $dataRow = $this->dataRow($dataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 10,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.created_at', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 11,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.updated_at', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'booking_belongsto_contact_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('seeders.data_rows.contact'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
                'details'      => [
                    "model"         => Contact::class,
                    "table"         => "contacts",
                    "type"          => "belongsTo",
                    "column"        => "contact_id",
                    "key"           => "id",
                    "label"         => "display_data",
                    "pivot_table"   => "bookings",
                    "pivot"         => 0,
                    "taggable"      => null
                    ],
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.contact', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'booking_belongsto_paysystem_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('seeders.data_rows.paysystem'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
                'details'      => [
                    "model"         => Paysystem::class,
                    "table"         => "paysystems",
                    "type"          => "belongsTo",
                    "column"        => "paysystem_id",
                    "key"           => "id",
                    "label"         => "title",
                    "pivot_table"   => "bookings",
                    "pivot"         => 0,
                    "taggable"      => null
                ],
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.paysystem', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'booking_belongstomany_room_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('seeders.data_rows.rooms'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
                'details'      => [
                    "view"          => "relationship_pivot",
                    "pivot_columns" => ['count' => "%s шт.", "date_in" => "Заезд: %s", "date_out" => "Выезд: %s"],
                    "model"         => Room::class,
                    "table"         => "rooms",
                    "type"          => "belongsToMany",
                    "column"        => "id",
                    "key"           => "id",
                    "label"         => "title",
                    "pivot_table"   => "booking_room",
                    "pivot"         => 1,
                    "taggable"      => null
                    ],
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.rooms', [], 'en'),
            ], 'en');
        }

        //Permissions
        Permission::generateFor('bookings');

        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name', 'bookings');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('seeders.menu_items.bookings'),
            'url'     => '',
            'route'   => 'voyager.bookings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-calendar',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();

            $this->translate($menuItem, [
                'title' => __('seeders.menu_items.bookings', [], 'en'),
            ], 'en');

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
