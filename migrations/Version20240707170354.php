<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240707170354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contain (id INT AUTO_INCREMENT NOT NULL, id_time_sheet_id INT DEFAULT NULL, id_day_id INT DEFAULT NULL, work_hours INT NOT NULL, off_hours INT NOT NULL, comment VARCHAR(255) NOT NULL, INDEX IDX_4BEFF7C891BF940C (id_time_sheet_id), INDEX IDX_4BEFF7C82FF5F4CB (id_day_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_sheet (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, period VARCHAR(255) NOT NULL, user_status TINYINT(1) NOT NULL, INDEX IDX_C24E709E79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_sheet_status (id INT AUTO_INCREMENT NOT NULL, id_manager_id INT DEFAULT NULL, id_time_sheet_id INT DEFAULT NULL, manager_status TINYINT(1) NOT NULL, INDEX IDX_D61429ADDB4B4B4 (id_manager_id), INDEX IDX_D61429A91BF940C (id_time_sheet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_manager_id INT DEFAULT NULL, id_role_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, workingplace VARCHAR(255) NOT NULL, count_reminder INT NOT NULL, last_reminder DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649DDB4B4B4 (id_manager_id), INDEX IDX_8D93D64989E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_day (id INT AUTO_INCREMENT NOT NULL, day_name VARCHAR(255) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contain ADD CONSTRAINT FK_4BEFF7C891BF940C FOREIGN KEY (id_time_sheet_id) REFERENCES time_sheet (id)');
        $this->addSql('ALTER TABLE contain ADD CONSTRAINT FK_4BEFF7C82FF5F4CB FOREIGN KEY (id_day_id) REFERENCES work_day (id)');
        $this->addSql('ALTER TABLE time_sheet ADD CONSTRAINT FK_C24E709E79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE time_sheet_status ADD CONSTRAINT FK_D61429ADDB4B4B4 FOREIGN KEY (id_manager_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE time_sheet_status ADD CONSTRAINT FK_D61429A91BF940C FOREIGN KEY (id_time_sheet_id) REFERENCES time_sheet (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DDB4B4B4 FOREIGN KEY (id_manager_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contain DROP FOREIGN KEY FK_4BEFF7C891BF940C');
        $this->addSql('ALTER TABLE contain DROP FOREIGN KEY FK_4BEFF7C82FF5F4CB');
        $this->addSql('ALTER TABLE time_sheet DROP FOREIGN KEY FK_C24E709E79F37AE5');
        $this->addSql('ALTER TABLE time_sheet_status DROP FOREIGN KEY FK_D61429ADDB4B4B4');
        $this->addSql('ALTER TABLE time_sheet_status DROP FOREIGN KEY FK_D61429A91BF940C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DDB4B4B4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989E8BDC');
        $this->addSql('DROP TABLE contain');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE time_sheet');
        $this->addSql('DROP TABLE time_sheet_status');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE work_day');
    }
}
