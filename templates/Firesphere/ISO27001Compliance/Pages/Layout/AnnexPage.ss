<div class="container-full page-background">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content">
                        <h1>ISO27001 RASCI Table</h1>
                        <p>
                            <b>The roles are identified as R, A, S, C or I meaning:</b><br/>
                            <b>Responsible</b> i.e. this role has primary responsibility for performing the activities
                            in this section.<br/>
                            <b>Accountable</b> i.e. this role will be called to account if the risks materialize
                            (usually because preventive controls fail): it is generally the budget holder.<br/>
                            <b>Supportive</b> i.e. this role actively assists with the design, implementation or
                            management of the activities in this section.<br/>
                            <b>Consulted</b> i.e. this is a hands-off role, offering guidance and direction to those
                            more actively involved.<br/>
                            <b>Informed</b> i.e. this role has an interest in the status of the risks in this section
                            and should be kept in touch with the situation.<br/>
                        </p>
                        <h3>WARNING This page does not work well on mobile devices or small screens.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="Form_SaveForm" action="$URLSegment/SaveForm/" method="post"
          enctype="application/x-www-form-urlencoded" class="col">

        <% cached $cacheKey %>
            <% with $Annex %>
                <table class="rasci table-hover table-bordered col table-header-rotated content">
                    <thead>
                    <tr class="alert alert-primary">
                        <th rowspan="2">Annex</th>
                        <th rowspan="2">Section of ISO/IEC 27001:2013</th>
                        <% loop $Teams %>
                            <th rowspan="2" class="rotate-45 rasci_team $FirstLast">
                                <div><span>$Name</span></div>
                            </th>
                        <% end_loop %>
                        <th rowspan=2 class="text-center">References or Owner</th>
                        <th class="savebutton text-right">$Top.SaveForm.Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $AnnexChapters %>
                        <tr class="table-info">
                            <td colspan="$AnnexSet.getTeamCount(2)"><b>Annex A.$AnnexNo: $Title</b></td>
                            <td colspan="2"><a href="$Reference" target="_blank">Reference for Annex $AnnexNo</a></td>
                        </tr>
                            <% loop $Subsidiaries %>
                                <% if $SubChapterID %>
                                    <% with $SubChapter %>
                                        <% include SubChapter AnnexChapter=$Up.AnnexChapter %>
                                    <% end_with %>
                                <% end_if %>
                            <tr class="$EvenOdd">
                                <td class="subsidiary_number"><code>$SubNo</code></td>
                                <td class="subsidiary_title">$Title</td>
                                <% loop $SubsidiaryTeam %>
                                    <% include SubsidiaryRasci Subsidiary=$Up.ID %>
                                <% end_loop %>
                                <td colspan="2" class="subsidiary_reference">
                                    $Lead
                                    <% if $PolicyPages %>
                                        <% if $Lead %><br/><% end_if %>
                                        Related
                                        <% if $PolicyPages.Count > 1 %>
                                            Policies:
                                        <% else %>
                                            Policy:
                                        <% end_if %><br />
                                        <% loop $PolicyPages %>
                                            <a href="$Link" class="$FirstLast">$Title</a><% if not $Last %>, <% end_if %>
                                        <% end_loop %>
                                    <% end_if %>
                                </td>
                            </tr>
                            <% end_loop %>
                        <% end_loop %>
                    </tbody>
                </table>
            <% end_with %>
        <% end_cached %>
        $SaveForm.Fields.FieldByName('SecurityID')
    </form>
</div>
<div class="container-full">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content table-total-table">
                        <% include TotalsTable %>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col">&nbsp;</div>
