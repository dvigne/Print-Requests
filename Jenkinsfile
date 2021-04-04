pipeline {
  agent none
  stages {
    stage('Setup Environment') {
      agent {
        docker { image 'composer' }
      }
      steps {
        sh "composer install --no-ansi --dev"
        sh "cp .env.example .env"
        sh "php artisan key:generate"
      }
    }

    stage('Compile Front End Assets') {
      agent { dockerfile true }
      steps {
        sh 'npm install'
        sh "npm run prod"
      }
    }

    stage('Run Tests') {
      agent {
        docker {
          image 'php'
        }
      }
      steps {
        sh 'touch print.db'
        withCredentials([string(credentialsId: 'octoprint_url', variable: 'OCTOPRINT_URL'), string(credentialsId: 'octoprint_api_key', variable: 'OCTOPRINT_API_KEY')]) {
          sh './vendor/bin/phpunit'
        }
      }
    }
  }
}
