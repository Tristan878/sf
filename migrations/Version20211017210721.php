<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017210721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video ADD id_video_id INT NOT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C791AECDB FOREIGN KEY (id_video_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C791AECDB ON video (id_video_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C791AECDB');
        $this->addSql('DROP INDEX IDX_7CC7DA2C791AECDB ON video');
        $this->addSql('ALTER TABLE video DROP id_video_id');
    }
}
