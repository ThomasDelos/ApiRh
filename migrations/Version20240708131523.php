<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708131523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contain DROP FOREIGN KEY FK_4BEFF7C82FF5F4CB');
        $this->addSql('ALTER TABLE contain DROP FOREIGN KEY FK_4BEFF7C891BF940C');
        $this->addSql('DROP INDEX IDX_4BEFF7C82FF5F4CB ON contain');
        $this->addSql('DROP INDEX IDX_4BEFF7C891BF940C ON contain');
        $this->addSql('ALTER TABLE contain ADD workday_id INT NOT NULL, ADD timesheet_id INT NOT NULL, DROP id_time_sheet_id, DROP id_day_id');
        $this->addSql('ALTER TABLE contain ADD CONSTRAINT FK_4BEFF7C8AB01D695 FOREIGN KEY (workday_id) REFERENCES work_day (id)');
        $this->addSql('ALTER TABLE contain ADD CONSTRAINT FK_4BEFF7C8ABDD46BE FOREIGN KEY (timesheet_id) REFERENCES time_sheet (id)');
        $this->addSql('CREATE INDEX IDX_4BEFF7C8AB01D695 ON contain (workday_id)');
        $this->addSql('CREATE INDEX IDX_4BEFF7C8ABDD46BE ON contain (timesheet_id)');
        $this->addSql('ALTER TABLE time_sheet ADD id_contain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_sheet ADD CONSTRAINT FK_C24E709E373F0AC7 FOREIGN KEY (id_contain_id) REFERENCES contain (id)');
        $this->addSql('CREATE INDEX IDX_C24E709E373F0AC7 ON time_sheet (id_contain_id)');
        $this->addSql('ALTER TABLE user DROP INDEX IDX_8D93D649DDB4B4B4, ADD UNIQUE INDEX UNIQ_8D93D649DDB4B4B4 (id_manager_id)');
        $this->addSql('ALTER TABLE user CHANGE id_role_id id_role_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP INDEX UNIQ_8D93D649DDB4B4B4, ADD INDEX IDX_8D93D649DDB4B4B4 (id_manager_id)');
        $this->addSql('ALTER TABLE user CHANGE id_role_id id_role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_sheet DROP FOREIGN KEY FK_C24E709E373F0AC7');
        $this->addSql('DROP INDEX IDX_C24E709E373F0AC7 ON time_sheet');
        $this->addSql('ALTER TABLE time_sheet DROP id_contain_id');
        $this->addSql('ALTER TABLE contain DROP FOREIGN KEY FK_4BEFF7C8AB01D695');
        $this->addSql('ALTER TABLE contain DROP FOREIGN KEY FK_4BEFF7C8ABDD46BE');
        $this->addSql('DROP INDEX IDX_4BEFF7C8AB01D695 ON contain');
        $this->addSql('DROP INDEX IDX_4BEFF7C8ABDD46BE ON contain');
        $this->addSql('ALTER TABLE contain ADD id_time_sheet_id INT DEFAULT NULL, ADD id_day_id INT DEFAULT NULL, DROP workday_id, DROP timesheet_id');
        $this->addSql('ALTER TABLE contain ADD CONSTRAINT FK_4BEFF7C82FF5F4CB FOREIGN KEY (id_day_id) REFERENCES work_day (id)');
        $this->addSql('ALTER TABLE contain ADD CONSTRAINT FK_4BEFF7C891BF940C FOREIGN KEY (id_time_sheet_id) REFERENCES time_sheet (id)');
        $this->addSql('CREATE INDEX IDX_4BEFF7C82FF5F4CB ON contain (id_day_id)');
        $this->addSql('CREATE INDEX IDX_4BEFF7C891BF940C ON contain (id_time_sheet_id)');
    }
}
