<?php

use yii\db\Migration;

/**
 * Class m210406_103146_create_task
 */
class m210406_103146_create_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
            'todos' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }

}
