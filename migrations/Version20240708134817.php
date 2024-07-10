<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708134817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_sheet_status ADD time_sheet_id INT DEFAULT NULL, ADD manager_id INT NOT NULL');
        $this->addSql('ALTER TABLE time_sheet_status ADD CONSTRAINT FK_D61429A2F974569 FOREIGN KEY (time_sheet_id) REFERENCES time_sheet (id)');
        $this->addSql('ALTER TABLE time_sheet_status ADD CONSTRAINT FK_D61429A783E3463 FOREIGN KEY (manager_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D61429A2F974569 ON time_sheet_status (time_sheet_id)');
        $this->addSql('CREATE INDEX IDX_D61429A783E3463 ON time_sheet_status (manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_sheet_status DROP FOREIGN KEY FK_D61429A2F974569');
        $this->addSql('ALTER TABLE time_sheet_status DROP FOREIGN KEY FK_D61429A783E3463');
        $this->addSql('DROP INDEX IDX_D61429A2F974569 ON time_sheet_status');
        $this->addSql('DROP INDEX IDX_D61429A783E3463 ON time_sheet_status');
        $this->addSql('ALTER TABLE time_sheet_status DROP time_sheet_id, DROP manager_id');
    }
}
