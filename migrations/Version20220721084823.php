<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721084823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrative_department (id INT AUTO_INCREMENT NOT NULL, firstname_of_deceased VARCHAR(50) NOT NULL, lastname_of_deceased VARCHAR(50) NOT NULL, maiden_name_of_deceased VARCHAR(50) DEFAULT NULL, adress_deceased VARCHAR(255) NOT NULL, zip_code_of_deceased INT NOT NULL, city_of_deceased VARCHAR(50) NOT NULL, date_of_birth DATE NOT NULL, place_of_birth VARCHAR(255) NOT NULL, date_of_deceased DATE NOT NULL, place_of_deceased VARCHAR(255) NOT NULL, firstname VARCHAR(50) DEFAULT NULL, lastname VARCHAR(50) DEFAULT NULL, mail VARCHAR(100) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, postal_code INT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE babysitting_service (id INT AUTO_INCREMENT NOT NULL, number_child INT NOT NULL, number_hour INT NOT NULL, content VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, housekeeping_id INT DEFAULT NULL, personal_assistance_service_id INT DEFAULT NULL, administrative_department_id INT DEFAULT NULL, babysitting_id INT DEFAULT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, maiden_name VARCHAR(50) DEFAULT NULL, mail VARCHAR(100) DEFAULT NULL, adress VARCHAR(255) NOT NULL, zip_code INT NOT NULL, city VARCHAR(100) NOT NULL, phone_number VARCHAR(10) NOT NULL, content VARCHAR(255) DEFAULT NULL, preferency TINYINT(1) NOT NULL, created_at DATE NOT NULL, UNIQUE INDEX UNIQ_4C62E6382839160B (housekeeping_id), UNIQUE INDEX UNIQ_4C62E638F80D8CE9 (personal_assistance_service_id), UNIQUE INDEX UNIQ_4C62E6387E4350FB (administrative_department_id), UNIQUE INDEX UNIQ_4C62E638C5E08969 (babysitting_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE days (id INT AUTO_INCREMENT NOT NULL, babysitting_service_id INT DEFAULT NULL, name VARCHAR(50) DEFAULT NULL, INDEX IDX_EBE4FC66A2128973 (babysitting_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frequency (id INT AUTO_INCREMENT NOT NULL, housekeeping_id INT DEFAULT NULL, type VARCHAR(20) DEFAULT NULL, INDEX IDX_267FB8132839160B (housekeeping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE housekeeping (id INT AUTO_INCREMENT NOT NULL, number_hour INT NOT NULL, content VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, personal_assistance_service_id INT DEFAULT NULL, babysitting_service_id INT DEFAULT NULL, moment VARCHAR(50) NOT NULL, INDEX IDX_D11814ABF80D8CE9 (personal_assistance_service_id), INDEX IDX_D11814ABA2128973 (babysitting_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personal_assistance (id INT AUTO_INCREMENT NOT NULL, personal_assistance_service_id INT NOT NULL, type VARCHAR(50) NOT NULL, INDEX IDX_5B9F2252F80D8CE9 (personal_assistance_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personal_assistance_service (id INT AUTO_INCREMENT NOT NULL, financial_help TINYINT(1) NOT NULL, content VARCHAR(250) DEFAULT NULL, organization VARCHAR(250) DEFAULT NULL, number_hour INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, place_order INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruitment (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, created_at DATE NOT NULL, visibility TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6382839160B FOREIGN KEY (housekeeping_id) REFERENCES housekeeping (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F80D8CE9 FOREIGN KEY (personal_assistance_service_id) REFERENCES personal_assistance_service (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387E4350FB FOREIGN KEY (administrative_department_id) REFERENCES administrative_department (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638C5E08969 FOREIGN KEY (babysitting_id) REFERENCES babysitting_service (id)');
        $this->addSql('ALTER TABLE days ADD CONSTRAINT FK_EBE4FC66A2128973 FOREIGN KEY (babysitting_service_id) REFERENCES babysitting_service (id)');
        $this->addSql('ALTER TABLE frequency ADD CONSTRAINT FK_267FB8132839160B FOREIGN KEY (housekeeping_id) REFERENCES housekeeping (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABF80D8CE9 FOREIGN KEY (personal_assistance_service_id) REFERENCES housekeeping (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABA2128973 FOREIGN KEY (babysitting_service_id) REFERENCES babysitting_service (id)');
        $this->addSql('ALTER TABLE personal_assistance ADD CONSTRAINT FK_5B9F2252F80D8CE9 FOREIGN KEY (personal_assistance_service_id) REFERENCES personal_assistance_service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6387E4350FB');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638C5E08969');
        $this->addSql('ALTER TABLE days DROP FOREIGN KEY FK_EBE4FC66A2128973');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABA2128973');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6382839160B');
        $this->addSql('ALTER TABLE frequency DROP FOREIGN KEY FK_267FB8132839160B');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABF80D8CE9');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638F80D8CE9');
        $this->addSql('ALTER TABLE personal_assistance DROP FOREIGN KEY FK_5B9F2252F80D8CE9');
        $this->addSql('DROP TABLE administrative_department');
        $this->addSql('DROP TABLE babysitting_service');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE days');
        $this->addSql('DROP TABLE frequency');
        $this->addSql('DROP TABLE housekeeping');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE personal_assistance');
        $this->addSql('DROP TABLE personal_assistance_service');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE recruitment');
    }
}
