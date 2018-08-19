<?php
use Migrations\AbstractMigration;

class Notes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        // create the table
        $table = $this->table('notes');
        $table->addColumn('headline', 'string')
            ->addColumn('body', 'text')
            ->create();
    }
}
