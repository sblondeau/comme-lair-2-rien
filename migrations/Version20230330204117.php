<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330204117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE press_review ADD spectacle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE press_review ADD CONSTRAINT FK_38F2B3C5C682915D FOREIGN KEY (spectacle_id) REFERENCES spectacle (id)');
        $this->addSql('CREATE INDEX IDX_38F2B3C5C682915D ON press_review (spectacle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE press_review DROP FOREIGN KEY FK_38F2B3C5C682915D');
        $this->addSql('DROP INDEX IDX_38F2B3C5C682915D ON press_review');
        $this->addSql('ALTER TABLE press_review DROP spectacle_id');
    }
}
