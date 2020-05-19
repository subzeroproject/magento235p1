<?php

namespace Tutorial\Trunghn\Setup;

use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $installer->getConnection()->addColumn(
                $installer->getTable('tutorial_trunghn'),
                'obs_title',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'comment' => 'Observer Title'
                ]
            );

            $table = $installer->getConnection()->newTable(
                $installer->getTable('faq_store')
            )->addColumn(
                'id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'ID'
            )->addColumn(
                'id_faq',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false
                ],
                'FAQ ID'
            )->addColumn(
                'store_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_SMALLINT,
                5,
                [
                    'unsigned' => true,
                    'nullable'=> false
                ],
                'Store ID'
            )->addForeignKey(
                $setup->getFkName('faq_store', 'id_faq', 'tutorial_trunghn', 'id_faq'),
                'id_faq',
                $setup->getTable('tutorial_trunghn'),
                'id_faq',
                Table::ACTION_CASCADE
            )->addForeignKey(
                $setup->getFkName('faq_store', 'store_id', 'store', 'store_id'),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                Table::ACTION_CASCADE
            )->setComment('FAQ Store table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
