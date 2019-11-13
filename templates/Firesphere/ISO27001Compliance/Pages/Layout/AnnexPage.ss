<div class="container-full page-background">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content">
                        <h1>ISO27001 RASCI Table</h1>
                        <p>
                            <%t AnnexPage.EXPLAIN '<b>The roles are identified as R, A, S, C or I meaning:</b><br/>
                            <b>Responsible</b> i.e. this role has primary responsibility for performing the activities
                            in this section.<br/>
                            <b>Accountable</b> i.e. this role will be called to account if the risks materialize
                            (usually because preventive controls fail): it is generally the budget holder.<br/>
                            <b>Supportive</b> i.e. this role actively assists with the design, implementation or
                            management of the activities in this section.<br/>
                            <b>Consulted</b> i.e. this is a hands-off role, offering guidance and direction to those
                            more actively involved.<br/>
                            <b>Informed</b> i.e. this role has an interest in the status of the risks in this section
                            and should be kept in touch with the situation.<br/>' %>
                        </p>
                        <h3>WARNING This page does not work well on mobile devices or small screens.</h3>
                        <br/>
                        <h4>Compare against another RASCI set</h4>
                        $CompareForm
                        <p>Please note, comparing is a slow process, so please have a little bit of patience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="Form_SaveForm" action="$URLSegment/SaveForm/" method="post"
          enctype="application/x-www-form-urlencoded" class="col">
        <% if $compare %>
            <h2>Comparing against $comparePage.Title</h2>
        <% end_if %>

        <% cached $cacheKey %>
            <% with $Annex %>
                <table class="rasci table-hover table-bordered col table-header-rotated content <% if $Top.compare %>compare<% end_if %>">
                    <thead>
                    <tr class="alert alert-primary">
                        <th rowspan="2"></th>
                        <th rowspan="2">Section of ISO/IEC 27001:2013<br />$Up.Title
                            <% if $Up.compare %><br />&nbsp;<i>&raquo; Comparing against:</i>
                                $Up.comparePage.Title
                            <% end_if %>
                        </th>
                        <% loop $CachedTeams %>
                            <th rowspan="2" class="rotate-45 rasci_team $FirstLast">
                                <div class="<% if $Top.compare %>Compare<% else %>NoCompare<% end_if %>">
                                    <span>$Name</span></div>
                            </th>
                            <% if $Top.compare > 0 %>
                                <th rowspan="2" class="rotate-45 rasci_team compare $FirstLast">
                                    <div><span title="$Top.comparePage.Title"><i>Comparison</i></span></div>
                                </th>
                            <% end_if %>
                        <% end_loop %>
                        <% if not $Top.compare %>
                            <th rowspan=2 class="text-center">References or Owner</th>
                            <th class="savebutton text-right">$Top.SaveForm.Actions</th>
                        <% end_if %>
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $AnnexChapters %>
                        <tr class="table-info">
                            <td colspan="2"><b>Annex A.$AnnexNo: $Title</b></td>
                            <td colspan="$Up.getTeamCount()"></td>
                            <% if not $Top.compare %>
                                <td colspan="2"><a href="$Reference" target="_blank">Reference for Annex $AnnexNo</a>
                                </td>
                            <% end_if %>
                        </tr>
                            <% loop $Subsidiaries %>
                                <% if $SubChapterID %>
                                    <% with $SubChapter %>
                                        <% include SubChapter AnnexChapter=$Up.Up.Up, Comparing=$Top.compare %>
                                    <% end_with %>
                                <% end_if %>
                            <tr class="$EvenOdd">
                                <td class="subsidiary_number"><code>$SubNo</code></td>
                                <td class="subsidiary_title">$Title</td>
                                <% loop $getSubsidiaryTeams %>
                                    <% include SubsidiaryRasci Subsidiary=$Up.ID, Comparison=$Top.comparePage %>
                                <% end_loop %>
                                <% if not $Top.compare %>
                                    <td colspan="2" class="subsidiary_reference">
                                        $Lead
                                        <% if $PolicyPages.Count %>
                                            <% if $Lead %><br/><% end_if %>
                                            Related Policies:
                                            <br/>
                                            <% loop $PolicyPages %>
                                                <a href="$Link" class="$FirstLast">$Title</a><% if not $Last %>
                                                , <% end_if %>
                                            <% end_loop %>
                                        <% end_if %>
                                    </td>
                                <% end_if %>
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
