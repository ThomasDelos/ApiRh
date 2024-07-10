<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708135211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_sheet_status DROP FOREIGN KEY FK_D61429A91BF940C');
        $this->addSql('DROP INDEX IDX_D61429A91BF940C ON time_sheet_status');
        $this->addSql('ALTER TABLE time_sheet_status DROP id_time_sheet_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_sheet_status ADD id_time_sheet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_sheet_status ADD CONSTRAINT FK_D61429A91BF940C FOREIGN KEY (id_time_sheet_id) REFERENCES time_sheet (id)');
        $this->addSql('CREATE INDEX IDX_D61429A91BF940C ON time_sheet_status (id_time_sheet_id)');
    }
}
