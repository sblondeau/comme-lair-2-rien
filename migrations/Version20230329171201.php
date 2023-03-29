<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329171201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spectacle_character (id INT AUTO_INCREMENT NOT NULL, spectacle_id INT NOT NULL, company_member_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_4046FDE3C682915D (spectacle_id), INDEX IDX_4046FDE3468C590E (company_member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spectacle_character ADD CONSTRAINT FK_4046FDE3C682915D FOREIGN KEY (spectacle_id) REFERENCES spectacle (id)');
        $this->addSql('ALTER TABLE spectacle_character ADD CONSTRAINT FK_4046FDE3468C590E FOREIGN KEY (company_member_id) REFERENCES `member` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spectacle_character DROP FOREIGN KEY FK_4046FDE3C682915D');
        $this->addSql('ALTER TABLE spectacle_character DROP FOREIGN KEY FK_4046FDE3468C590E');
        $this->addSql('DROP TABLE spectacle_character');
    }
}
