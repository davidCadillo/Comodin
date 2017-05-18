<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$owner               = new Role();
		$owner->id           = 1;
		$owner->name         = 'owner';
		$owner->display_name = 'Product Owner';
		$owner->description  = 'Estoy asignando un usuario owner como rol';
		$owner->save();

		$owner               = new Role();
		$owner->id           = 2;
		$owner->name         = 'admin';
		$owner->display_name = 'Admin Project';
		$owner->description  = 'Estoy asignando un usuario amdin como rol';
		$owner->save();
	}
}
