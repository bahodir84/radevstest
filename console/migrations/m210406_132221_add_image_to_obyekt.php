<?php

use yii\db\Migration;

/**
 * Class m210406_132221_add_image_to_obyekt
 */
class m210406_132221_add_image_to_obyekt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('obyekt', 'image', $this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210406_132221_add_image_to_obyekt cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210406_132221_add_image_to_obyekt cannot be reverted.\n";

        return false;
    }
    */
}
