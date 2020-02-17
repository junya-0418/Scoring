<?php

namespace App\Repositories\Match;

interface MatchRepositoryInterface
{
    public function getAllTeams();

    //試合ごとの投稿数を取得
    public function getMatchesForSearch();

    //その試合のmvp数を集計
    public function getMvpCountsThisMatch($match);

    //選手の評価の平均点を取得
    public function getPlayerEvaluationAverage($match);

    //ホームチームに投稿したユーザーとアウェイチームに投稿したユーザーを取ってくる
    public function getPostsUsers($match);

    //プレーヤーごとのコメントを取得する
    public function getPlayerComments($match_id, $id);

    //フォームで選択されたチームの試合を取得する
    public function getMatchesForEvaluationForm($id);
}
