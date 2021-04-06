<?php

use yii\db\Migration;

/**
 * Class m210406_101254_create_obyekt
 */
class m210406_101254_create_obyekt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('obyekt', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
            'parent_id' => $this->integer(),
            'task_ids' => $this->string(255)
        ]);

        $this->createIndex(
            'index-obyekt-parent_id',
            'obyekt',
            'parent_id'
        );

        $this->addForeignKey(
            'fk-obyekt-parent_id',
            'obyekt',
            'parent_id',
            'obyekt',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `obyekt`
        $this->dropForeignKey(
            'fk-obyekt-parent_id',
            'obyekt'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'index-obyekt-parent_id',
            'obyekt'
        );

        $this->dropTable('obyekt');
    }

}
