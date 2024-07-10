<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708133616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_sheet DROP FOREIGN KEY FK_C24E709E373F0AC7');
        $this->addSql('DROP INDEX IDX_C24E709E373F0AC7 ON time_sheet');
        $this->addSql('ALTER TABLE time_sheet DROP id_contain_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_sheet ADD id_contain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_sheet ADD CONSTRAINT FK_C24E709E373F0AC7 FOREIGN KEY (id_contain_id) REFERENCES contain (id)');
        $this->addSql('CREATE INDEX IDX_C24E709E373F0AC7 ON time_sheet (id_contain_id)');
    }
}
