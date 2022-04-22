<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422073634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, siret VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prospect (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, siret VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD societe VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD quantite_produit INT NOT NULL, ADD produit VARCHAR(255) NOT NULL, ADD total_ht DOUBLE PRECISION NOT NULL, ADD total_ttc DOUBLE PRECISION NOT NULL, DROP nom_societe, DROP nom_client, DROP nom_produit, DROP quantite, DROP prix_ttc');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE prospect');
        $this->addSql('ALTER TABLE devis ADD nom_societe VARCHAR(255) NOT NULL, ADD nom_client VARCHAR(255) NOT NULL, ADD nom_produit VARCHAR(255) NOT NULL, ADD prix_ttc INT NOT NULL, DROP nom, DROP prenom, DROP email, DROP societe, DROP telephone, DROP adresse, DROP produit, DROP total_ht, DROP total_ttc, CHANGE quantite_produit quantite INT NOT NULL');
    }
}
