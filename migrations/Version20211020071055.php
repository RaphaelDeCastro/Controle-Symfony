<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211020071055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoriee (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, categoriee_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prã©nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal BIGINT DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, telephone BIGINT DEFAULT NULL, mail VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, INDEX IDX_4C62E638D7601CF4 (categoriee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638D7601CF4 FOREIGN KEY (categoriee_id) REFERENCES categoriee (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638D7601CF4');
        $this->addSql('DROP TABLE categoriee');
        $this->addSql('DROP TABLE contact');
    }
}
